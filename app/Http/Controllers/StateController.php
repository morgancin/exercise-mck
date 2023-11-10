<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Illuminate\Support\Facades\DB,
    Illuminate\Support\Facades\Http,
    Illuminate\Http\RedirectResponse,
    Illuminate\Contracts\Support\Renderable;

use Exception;

use App\Models\State;

class StateController extends Controller
{
    public function index(): Renderable
    {
        $states_data = State::all();

        return view('exercise.list', compact('states_data'));
    }

    public function store()
    {
        $success = true;
        DB::beginTransaction();

        try{
            $insert_data = $this->getStates();

            State::insert($insert_data);
            unset($insert_data);

        } catch (Exception $exception) {
            $success = false;
            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage()
            ]);
		}

        if ($success === true) {
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "Registro insertado correctamente"
            ]);
        }
    }

    public function getStates()
    {
        try	{
            $insert_data = array();
            $states_data = Http::get("https://gaia.inegi.org.mx/wscatgeo/mgee/");

            if(isset($states_data["datos"]))
            {
                if(count($states_data["datos"]) > 0)
                {
                    foreach($states_data["datos"] as $state)
                    {
                        $insert_data[] = array(
                            "pob" => (($state["pob"]) ? $state["pob"] : null),
                            "viv" => (($state["viv"]) ? $state["viv"] : null),
                            "cvegeo" => (($state["cvegeo"]) ? $state["cvegeo"] : null),
                            "pob_fem" => (($state["pob_fem"]) ? $state["pob_fem"] : null),
                            "pob_mas" => (($state["pob_mas"]) ? $state["pob_mas"] : null),
                            "cve_agee" => (($state["cve_agee"]) ? $state["cve_agee"] : null),
                            "nom_agee" => (($state["nom_agee"]) ? $state["nom_agee"] : null),
                            "nom_abrev" => (($state["nom_abrev"]) ? $state["nom_abrev"] : null)
                        );
                    }
                }
            }

            return $insert_data;

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
