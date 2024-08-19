<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	  protected $table = 'provinces';	
	  public $timestamps = true;	

protected $fillable = [
        'name',
        'gso_id'        
    ];

	/**
	 * Province has many .
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function shop()
	{
		// hasMany(RelatedModel, foreignKeyOnRelatedModel = province_id, localKey = id)
		return $this->hasMany(Shop::class);
	}
}
