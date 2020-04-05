<?php namespace Modules\Users\Entities\Sentinel;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;
use Laracasts\Presenter\PresentableTrait;
use Modules\Users\Entities\UserInterface;

class User extends EloquentUser implements UserInterface {

    use \Modules\Core\Presenters\PresentableTrait;

    protected $fillable = [
        'email',
        'password',
        'permissions',
        'first_name',
        'last_name',
        'facebook_id',
        'phone',
        'address',
        'age_group',
        'marital_status',
        'gender',
        'race',
        'nationality',
        'preferred_demography'
    ];

    /**
     * {@inheritDoc}
     */
    protected $loginNames = ['email','username'];

    protected $presenter = 'Modules\Users\Presenters\ModulePresenter';

    public function __construct(array $attributes = [])
    {
        $this->loginNames = config('users.login-columns');
        $this->fillable = config('users.fillable');

        parent::__construct($attributes);
    }

    public function editUrl()
    {
        try
        {
            return route('admin.' . $this->getTable() . '.edit', $this->id);
        } catch (InvalidArgumentException $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function indexUrl()
    {
        try
        {
            return route('admin.' . $this->getTable() . '.index');
        } catch (InvalidArgumentException $e)
        {
            Log::error($e->getMessage());
        }
    }

    /**
     * Checks if a user belongs to the given Role ID
     * @param  int $roleId
     * @return bool
     */
    public function hasRoleId($roleId)
    {
        return $this->roles()->whereId($roleId)->count() >= 1;
    }

    /**
     * Checks if a user belongs to the given Role Name
     * @param  string $name
     * @return bool
     */
    public function hasRoleName($name)
    {
        return $this->roles()->whereName($name)->count() >= 1;
    }

    /**
     * Check if the current user is activated
     * @return bool
     */
    public function isActivated()
    {
        if (Activation::completed($this))
        {
            return true;
        }

        return false;
    }

    public function __call($method, $parameters)
    {
        $class_name = class_basename($this);

        #i: Convert array to dot notation
        $config = implode('.', ['relations', $class_name, $method]);

        #i: Relation method resolver
        if (Config::has($config))
        {
            $function = Config::get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }


    public function artisan()
    {
        return $this->hasOne('Modules\Artisans\Entities\Artisan');
    }

    public function state()
    {
        return $this->belongsTo('Modules\States\Entities\State');
    }

    public function city()
    {
        return $this->belongsTo('Modules\Cities\Entities\City');
    }

    public function setPreferredDemographyAttribute($value)
    {
        $this->attributes['preferred_demography'] = json_encode($value);
    }

    public function getPreferredDemographyAttribute($value)
    {
        return json_decode($value, true);
    }

    public function category()
    {
        return $this->belongsTo('Modules\Categories\Entities\Category');
    }

    public function interests()
    {
        return $this->belongsToMany('Modules\Interests\Entities\Interest');
    }
}
