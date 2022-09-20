<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the todo primary key (id)
    * $this->attributes['title'] - string - contains the todo title (title)
    * $this->attributes['due_date'] - date - contains the todo due date (due_date)
    * $this->attributes['done'] - boolean - contains wether the todo is done or not (done)
    */

    public static function validate(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "due_date" => "required",
            "done" => "required",
        ]);
    }

    protected function id()
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

    protected function title()
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

    protected function due_date()
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }

    protected function done()
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => $value,
        );
    }
}
