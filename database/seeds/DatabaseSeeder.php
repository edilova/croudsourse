<?php
use App\Models\User as User;
use App\Models\Post as Post;
use App\Role as Role;
use App\Models\Translation as Translation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        //User::truncate();
        $role_admin   = Role::where('name','admin')->first();
        $role_manager = Role::where('name','manager')->first();
        $role_expert  = Role::where('name','expert')->first();
        $role_user    = Role::where('name','user')->first();


        $admin = User::create([
            'email'=>'admin@soztekser.kz',
            'password'=>Hash::make('admin'),
            'name'=>'Admin Adminych'
        ]);
        $admin->roles()->attach($role_admin);
        $manager = User::create([
            'email'=>'manager@soztekser.kz',
            'password'=>Hash::make('manager'),
            'name'=>'Manager'
        ]);
        $manager->roles()->attach($role_manager);
        $expert = User::create([
            'email'=>'expert@soztekser.kz',
            'password'=>Hash::make('expert'),
            'name'=>'Expert'
        ]);
        $manager->roles()->attach($role_manager);
        $user = User::create([
            'email'=>'user@soztekser.kz',
            'password'=>Hash::make('user'),
            'name'=>'Юзер Юзербеков'
        ]);
        $user->roles()->attach($role_user);

        $post1 = Post::create([
            'content'=>'Жана жылда тагыда Алматыга барамын',
            'user_id'=>1
        ]);
        $translation = Translation::create([
            'content'=>'Жана жылда тағыда Алматыға барамын',
            'post_id'=>1,
            'user_id'=>4
        ]);
        $posts = ['Алдағы 18-19 наурыз аралығында Шығыс Қазақстан облысының аласа таулы аудандарында ауа температурасының жоғарылауына және күтілетін жауын-шашын болжамына байланысты жергілікті және баурайлы ағын қалыптасып, су деңгейі көтерілуі мүмкін", - делінген хабарламада.  Еске салайық, 12 наурызда ШҚО-ның кей жерлерін су басқан еді. ҚР ІІМ Төтенше жағдайлар комитеті өкілдерінің мәліметінше, Шығыс Қазақстан облысындағы құтқарушылар тәулік бойы жұмыс істеп жатыр.',
                'Мамандардың болжамына қарағанда, Республиканың басым бөлігінде антициклонның тау сілемдері ауа райын анықтайды. Бірақ дүйсенбі күні Ресейдің Еуропалық бөлігінен атмосфералық фронттар жауын-шашын, солтүстік облыстарда қар және боран, оңтүстікте жаңбыр алып келеді. "Батыс облыстарда керісінше демалыс күндері жаңбыр, соңы ылғалды қарға айналатын қар, ал дүйсенбі күні жауын-шашынсыз болады деп болжанады. 17 наурызда тәулік бойы Қостанай облысының кей жерлерінде жел 15-20 м/с, жаяу бұрқасын күтіледі", - делінген синоптиктердің болжамында.',
                'Оңтүстіктен келетін циклонның әсерінен ел ордамыз Астанада қар аралас жаңбыр жауып, оңтүстік батыстан соғатын желдің екпіні секундына 9-14 метр және жылымық орнайды. Ауа температурасы түнде 0-5 аяз, күндіз 0-5 жылыға дейін жоғарылайды. "Наурыз мерекесі күндері күн райы жауын-шашынсыз, ауаның температурасы түнде 5-10 аяз, күндіз 0-5 аяз күтіледі. Бірақ, суық ұзаққа созылмайды, артынша кезекті циклонның әсерінен тұрақсыз күн райы байқалып,жылымық орнайды. Айдың соңында суық ауа массаларының келуіне байланысты күн қайтып суытады", - делінген хабарламада. ',
                '"Энергетика министрлігі мен әкімнің арасында меморандумға қол қойылды, қоқысты бөлек жинау туралы. Құжаттар дайындалып жатыр. Келесі жылы көшеміз. Қоқыстар сұрыпталып, құрғақ және сұйыққа бөлініп, әрқайсысына бөлек контейнерлар қойылады", - дейді қаланы тазартушы мекеменің бас директоры Дуслан Ахметов. Алайда, заңгер Марат Башимовтың айтуынша, бұл бастамаға халық тұрмақ, биліктің өзі дайын емес. Оған көшпес бұрын, алдымен зауыттар салынуы қажет екендігін айтады.  "Мемлекет  халықты дайындау керек, үгіт-насихат жүргізіп. Біздің сана-сезімімізді осындай жоғары деңгейге көтеру керек. Мысалы, Германияның тәжірибесін қарасаң, саған айыппұл салады: 50 еуро, ол 20 мың теңге", - дейді заңгер Марат Башимов.'
        ];
        foreach ($posts as $post){
            $postX = Post::create([
                'content'=>$post,
                'user_id'=>4
            ]);
        }
    }
}
