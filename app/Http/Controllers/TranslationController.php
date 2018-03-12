<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranslationRequest;
use App\Http\Requests\UpdateTranslationRequest;
use App\Repositories\TranslationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class TranslationController extends AppBaseController
{
    /** @var  TranslationRepository */
    private $translationRepository;

    public function __construct(TranslationRepository $translationRepo)
    {
        $this->translationRepository = $translationRepo;
    }

    /**
     * Display a listing of the Translation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->translationRepository->pushCriteria(new RequestCriteria($request));
        $translations = $this->translationRepository->all();

        return view('translations.index')
            ->with('translations', $translations);
    }

    /**
     * Show the form for creating a new Translation.
     *
     * @return Response
     */
    public function create()
    {
        return view('translations.create');
    }

    /**
     * Store a newly created Translation in storage.
     *
     * @param CreateTranslationRequest $request
     *
     * @return Response
     */
    public function store(CreateTranslationRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $translation = $this->translationRepository->create($input);
        Flash::success('Translation saved successfully.');

        return redirect(route('translations.index'));
    }

    /**
     * Display the specified Translation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $translation = $this->translationRepository->findWithoutFail($id);

        if (empty($translation)) {
            Flash::error('Translation not found');

            return redirect(route('translations.index'));
        }

        return view('translations.show')->with('translation', $translation);
    }

    /**
     * Show the form for editing the specified Translation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $translation = $this->translationRepository->findWithoutFail($id);

        if (empty($translation)) {
            Flash::error('Translation not found');

            return redirect(route('translations.index'));
        }

        return view('translations.edit')->with('translation', $translation);
    }

    /**
     * Update the specified Translation in storage.
     *
     * @param  int              $id
     * @param UpdateTranslationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranslationRequest $request)
    {
        $translation = $this->translationRepository->findWithoutFail($id);

        if (empty($translation)) {
            Flash::error('Translation not found');

            return redirect(route('translations.index'));
        }

        $translation = $this->translationRepository->update($request->all(), $id);

        Flash::success('Translation updated successfully.');

        return redirect(route('translations.index'));
    }

    /**
     * Remove the specified Translation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $translation = $this->translationRepository->findWithoutFail($id);

        if (empty($translation)) {
            Flash::error('Translation not found');

            return redirect(route('translations.index'));
        }

        $this->translationRepository->delete($id);

        Flash::success('Translation deleted successfully.');

        return redirect(route('translations.index'));
    }
}
