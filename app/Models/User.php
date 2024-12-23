<?php

namespace App\Models;

use Carbon\Carbon;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_login_at' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    /**
     * Accessor for Age.
     */
    public function age(): int
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }

    /**
     * A mutator to make sure the timezone is always in valid format.
     */
    public function setTimezoneAttribute($value)
    {
        $this->attributes['timezone'] = $value ?: 'UTC'; // 'UTC' is default value if empty
    }

    /**
     * MANY-TO-MANY
     * Several roles for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->orderByPivot('created_at', 'desc')->withTimestamps();
    }

    /**
     * MANY-TO-MANY
     * Several fields for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class)->orderByPivot('created_at', 'desc')->withTimestamps();
    }

    /**
     * MANY-TO-MANY
     * Several communities for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(Community::class)->orderByPivot('created_at', 'desc')->withTimestamps()->withPivot(['is_admin', 'status_id', 'reaction_id']);
    }

    /**
     * MANY-TO-MANY
     * Several events for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->orderByPivot('created_at', 'desc')->withTimestamps()->withPivot(['is_speaker', 'status_id', 'reaction_id']);
    }

    /**
     * MANY-TO-MANY
     * Several posts for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->orderByPivot('created_at', 'desc')->withTimestamps();
    }

    /**
     * MANY-TO-MANY
     * Several surveychoices for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function surveychoices(): BelongsToMany
    {
        return $this->belongsToMany(Surveychoice::class)->orderByPivot('created_at', 'desc')->withTimestamps();
    }

    /**
     * MANY-TO-MANY
     * Several users for several messages
     */
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class)->orderByPivot('created_at', 'desc')->withTimestamps()->withPivot('status_id');
    }

    /**
     * ONE-TO-MANY
     * One status for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * ONE-TO-MANY
     * One type for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * ONE-TO-MANY
     * One visibility for several users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visibility(): BelongsTo
    {
        return $this->belongsTo(Visibility::class);
    }

    /**
     * MANY-TO-ONE
     * Several websites for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function websites(): HasMany
    {
        return $this->hasMany(Website::class);
    }

    /**
     * MANY-TO-ONE
     * Several subscriptions for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * MANY-TO-ONE
     * Several teams for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * MANY-TO-ONE
     * Several restrictions for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restrictions(): HasMany
    {
        return $this->hasMany(Restriction::class);
    }

    /**
     * MANY-TO-ONE
     * Several blocked_users for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocked_users(): HasMany
    {
        return $this->hasMany(BlockedUser::class);
    }

    /**
     * MANY-TO-ONE
     * Several owned_events for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owned_events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * MANY-TO-ONE
     * Several owned_communities for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owned_communities(): HasMany
    {
        return $this->hasMany(Community::class);
    }

    /**
     * MANY-TO-ONE
     * Several carts for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * MANY-TO-ONE
     * Several payments for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * MANY-TO-ONE
     * Several files for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    /**
     * MANY-TO-ONE
     * Several owned_messages for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owned_messages(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    /**
     * MANY-TO-ONE
     * Several has_addressee_messages for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function as_addressee_messages(): HasMany
    {
        return $this->hasMany(Message::class, 'addressee_user_id');
    }

    /**
     * MANY-TO-ONE
     * Several owned_posts for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function owned_posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * MANY-TO-ONE
     * Several sent_reactions for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sent_reactions(): HasMany
    {
        return $this->hasMany(SentReaction::class);
    }

    /**
     * MANY-TO-ONE
     * Several histories_from for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories_from(): HasMany
    {
        return $this->hasMany(History::class, 'from_user_id');
    }

    /**
     * MANY-TO-ONE
     * Several histories_to for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories_to(): HasMany
    {
        return $this->hasMany(History::class, 'to_user_id');
    }

    /**
     * MANY-TO-ONE
     * Several notifications_from for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications_from(): HasMany
    {
        return $this->hasMany(Notification::class, 'from_user_id');
    }

    /**
     * MANY-TO-ONE
     * Several notifications_to for a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications_to(): HasMany
    {
        return $this->hasMany(Notification::class, 'to_user_id');
    }
}
