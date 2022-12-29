<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Type;
use Livewire\Component;

class ShowServices extends Component
{

    public $services;
    protected $listeners = ['typeSelected'];

    public function mount()
    {
        $this->services = Service::with('types')->get();
    }
    public function render()
    {
        $types = Type::All();   
        return view('livewire.show-services', [
            'types' => $types,
        ]
        );
    }
    public function typeSelected($type, $query, $max)
    {
        $this->services = Service::query();

        /*if ($type && $query && $max) {
            $this->services = Service::where('type_id', $type)
                ->where('title', 'like', '%' . $query . '%')
                ->where('max_price', '<=', $max);
        } else {
            
        } */

        if ($type && $query && $max) {
            $this->services = Service::where('type_id', $type)
                ->where('title', 'like', '%' . $query . '%')
                ->where('max_price', '<=', $max);
        } else {
            if ($type && $query) {
                $this->services = Service::where('type_id', $type)
                    ->where('title', 'like', '%' . $query . '%');
            } else {
                if ($type && $max) {
                    $this->services = Service::where('type_id', $type)
                        ->where('max_price', '<=', $max);
                } else {
                    if ($query && $max) {
                        $this->services = Service::where('title', 'like', '%' . $query . '%')
                            ->where('max_price', '<=', $max);
                    }else{
                        if ($type) {
                            $this->services = Service::where('type_id', $type);
                        } else {
                            if ($query) {
                                $this->services = Service::where('title', 'like', '%' . $query . '%');
                            } else {
                                if ($max) {
                                    $this->services = Service::where('max_price', '<=', $max);
                                }
                            }
                        }
                    }
                }
            }
        }
        
/*
        if ($type || $query) {
            $this->services = Service::whereRelation('type_id', $type);
        }

        if ($query) {
            $this->services = Service::where('title', 'like', '%' . $query . '%');
        }

        if ($max) {
            $this->services = Service::where('max_price', '<=', $max);
        }
*/
        $this->services = $this->services->get();
        

       

        
    }

}
