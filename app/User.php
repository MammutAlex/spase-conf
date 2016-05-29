<?php

    namespace App;

    use Cartalyst\Sentinel\Users\EloquentUser;

    class User extends EloquentUser
    {
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable
            = [
                'name', 'email', 'password',
            ];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden
            = [
                'password', 'remember_token',
            ];

        public
        function theroles()
        {
            return $this->belongsToMany('App\Role', 'role_users', 'user_id', 'role_id');
        }

        public
        function setTherolesAttribute($roles)
        {
            $this->theroles()->detach();
            if (!$roles) return;
            if (!$this->exists) $this->save();
            $this->theroles()->attach($roles);
        }

        public
        function getTherolesAttribute($roles)
        {
            return array_pluck($this->theroles()->get(['id'])->toArray(), 'id');
        }

        public
        function info()
        {
            return $this->hasOne('App\UserInfo');
        }

        public
        function country()
        {
            return $this->belongsTo(Country::class, 'country_id');
        }

        public
        function city()
        {
            return $this->belongsTo(City::class, 'city_id');
        }

        public
        function spaceorganization()
        {
            return $this->belongsTo(Spaceorganization::class, 'organization_id');
        }
    }
