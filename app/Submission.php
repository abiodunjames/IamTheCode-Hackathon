<?php

namespace App;

class Submission {

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'image_url', 'lng', 'lat',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'created_date',
  ];

}

?>
