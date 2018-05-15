<?php
namespace App\CoreExtensions;
use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Auth\Authenticatable;
class SessionGuardExtended extends SessionGuard
{
    public function user(){
        //echo "SESSION GUARD EXTENDED v1";
        if ($this->loggedOut) {
            return;
        }

        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        if (! is_null($this->user)) {
            return $this->user;
        }

        $id = $this->session->get($this->getName());

        // First we will try to load the user using the identifier in the session if
        // one exists. Otherwise we will check for a "remember me" cookie in this
        // request, and if one exists, attempt to retrieve the user using that.
        if (! is_null($id)) {
            if ($this->user = $this->provider->retrieveById($id)) {
                $this->fireAuthenticatedEvent($this->user);
            }
        }

        // If the user is null, but we decrypt a "recaller" cookie we can attempt to
        // pull the user data on that cookie which serves as a remember cookie on
        // the application. Once we have a user we can return it to the caller.
        $recaller = $this->recaller();

        if (is_null($this->user) && ! is_null($recaller)) {
            $this->user = $this->userFromRecaller($recaller);

            if ($this->user) {
                $this->updateSession($this->user->getAuthIdentifier());

                $this->fireLoginEvent($this->user, true);
            }
        }

        // If the user is not registered set him as anonymous user 
        //echo "SESSION GUARD.php";
        if ( is_null($this->user)){
            $this->user = $this->provider->createModel();
            $this->user->anonymous = true;
            $this->user->save();
            $role_user = \App\Role::where('name','user')->first();
            $this->user->roles()->attach($role_user);
            $this->updateSession($this->user->getAuthIdentifier());
            $this->fireLoginEvent($this->user,true);
            $this->ensureRememberTokenIsSet($this->user);
            $this->queueRecallerCookie($this->user);
        }

        return $this->user;
    }
}