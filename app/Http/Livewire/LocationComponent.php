<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Direction;
use Illuminate\Support\Facades\Http;

class LocationComponent extends Component
{
    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    public function mount(Direction $bdData)
    {   
        if($bdData && !empty($bdData->id)) {
            $this->selectedCountry = $bdData->country;
            $this->selectedState = $bdData->state;
            $this->selectedCity = $bdData->city;
        }
        
        $this->loadCountries();
    }

    public function getAccess()
    {
        try{
            $response = Http::withHeaders([
                "Accept" => "application/json",
                "api-token" => "JFbrxSKpJtb4eB9-c7b21lF2FPESZFv1eqfTfmx5byHFFXJCs9EsieY4Grqgm5R1dzk",
                "user-email" => "pedroamair@hotmail.com"
            ])->get('https://www.universal-tutorial.com/api/getaccesstoken');
    
            if($response->successful()) {
                return $response->json('auth_token');
            }else{
                return response()->json(['error' => 'Error en la respuesta de la API'], $response->status());
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()], 500);
        }
    }

    public function loadCountries()
    {
        try{
            $authToken = $this->getAccess();

            $countries = Http::withHeaders([
                "Authorization" => "Bearer ". $authToken,
            ])->get('https://www.universal-tutorial.com/api/countries/');

            if($countries->successful()) {
                $this->countries =  $countries->json();
            }else{
                return response()->json(['error' => 'Problemas al recibir los paises desde la API'], $countries->status());
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()], 500);
        }
    }

    public function loadStates()
    {
        if($this->selectedCountry) {
            
            try{
                $authToken = $this->getAccess();

                $states = Http::withHeaders([
                    "Authorization" => "Bearer ". $authToken,
                ])->get('https://www.universal-tutorial.com/api/states/'.$this->selectedCountry);

                if($states->successful()) {
                    $this->states = $states->json();
                    $this->selectedState = null;
                    $this->cities = [];
                }else{
                    return response()->json(['error' => 'Problemas al recibir los estados desde la API'], $states->status());
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()], 500);
            }
        }
    }

    public function loadCities()
    {
        if($this->selectedState) {

            try {
                $authToken = $this->getAccess();

                $cities = Http::withHeaders([
                    "Authorization" => "Bearer ". $authToken,
                ])->get('https://www.universal-tutorial.com/api/cities/'.$this->selectedState);
                
                if($cities->successful()) {
                    $this->cities = $cities->json();
                    $this->selectedCity = null;
                }else{
                    return response()->json(['error' => 'Problemas al recibir las ciudades desde la API'], $cities->status());
                }
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()], 500);
            }
        }
    }
    
    public function render()
    {
        return view('livewire.location-component');
    }
}
