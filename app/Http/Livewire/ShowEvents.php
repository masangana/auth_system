<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Event;
use Livewire\Component;

class ShowEvents extends Component
{
    public $events;

    protected $listeners = ['categorySelected'];

    public function mount()
    {
        $this->events = Event::with('categories')->get();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.show-events',
            [
                'categories' => $categories,
            ]
        );
    }

    public function categorySelected($category, $start_date, $end_date, $query)
    {
        $this->events = Event::query();

        if ($category && $start_date && $end_date && $query) {
            $this->events = Event::where('category_id', $category)
                ->where('start_date', 'like', '%'.$start_date.'%')
                ->where('end_date', 'like', '%'.$end_date.'%')
                ->where('title', 'like', '%'.$query.'%');
        } else {
            if ($category && $start_date && $end_date) {
                $this->events = Event::where('category_id', $category)
                    ->where('start_date', 'like', '%'.$start_date.'%')
                    ->where('end_date', 'like', '%'.$end_date.'%');
            } else {
                if ($category && $start_date && $query) {
                    $this->events = Event::where('category_id', $category)
                        ->where('start_date', 'like', '%'.$start_date.'%')
                        ->where('title', 'like', '%'.$query.'%');
                } else {
                    if ($category && $end_date && $query) {
                        $this->events = Event::where('category_id', $category)
                            ->where('end_date', 'like', '%'.$end_date.'%')
                            ->where('title', 'like', '%'.$query.'%');
                    } else {
                        if ($start_date && $end_date && $query) {
                            $this->events = Event::where('start_date', 'like', '%'.$start_date.'%')
                                ->where('end_date', 'like', '%'.$end_date.'%')
                                ->where('title', 'like', '%'.$query.'%');
                        } else {
                            if ($category && $start_date) {
                                $this->events = Event::where('category_id', $category)
                                    ->where('start_date', 'like', '%'.$start_date.'%');
                            } else {
                                if ($category && $end_date) {
                                    $this->events = Event::where('category_id', $category)
                                        ->where('end_date', 'like', '%'.$end_date.'%');
                                } else {
                                    if ($category && $query) {
                                        $this->events = Event::where('category_id', $category)
                                            ->where('title', 'like', '%'.$query.'%');
                                    } else {
                                        if ($start_date && $end_date) {
                                            $this->events = Event::where('start_date', 'like', '%'.$start_date.'%')
                                                ->where('end_date', 'like', '%'.$end_date.'%');
                                        } else {
                                            if ($start_date && $query) {
                                                $this->events = Event::where('start_date', 'like', '%'.$start_date.'%')
                                                    ->where('title', 'like', '%'.$query.'%');
                                            } else {
                                                if ($end_date && $query) {
                                                    $this->events = Event::where('end_date', 'like', '%'.$end_date.'%')
                                                        ->where('title', 'like', '%'.$query.'%');
                                                } else {
                                                    if ($category) {
                                                        $this->events = Event::where('category_id', $category);
                                                    } else {
                                                        if ($start_date) {
                                                            $this->events = Event::where('start_date', 'like', '%'.$start_date.'%');
                                                        } else {
                                                            if ($end_date) {
                                                                $this->events = Event::where('end_date', 'like', '%'.$end_date.'%');
                                                            } else {
                                                                if ($query) {
                                                                    $this->events = Event::where('title', 'like', '%'.$query.'%');
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->events = $this->events->get();
    }
}
