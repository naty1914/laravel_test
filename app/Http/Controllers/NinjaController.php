<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\Dojos;
use App\Models\Ninja;



class NinjaController extends Controller
{
    /**
 * @OA\Get(
 *     path="/",
 *     tags={"Ninjas"},
 *     @OA\Response(
 *         response=200,
 *         description="Welcome page",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Ninja")
 *         )
 *     )
 * )
 */

      /**
      * @OA\Get(
      *     path="/",
      *     tags={"Ninjas"},
      *     @OA\Response(
      *         response=200,
      *         description="Welcome page",
      *         @OA\JsonContent(
      *             type="array",
      *             @OA\Items(ref="#/components/schemas/Ninja")
      *         )
      *     )
      * )
      */
    public function index()
    {
        $Ninjas = Ninja::with('dojo')->orderBy("created_at","desc")->paginate(perPage: 10);
        return view('ninjas.index', ["ninjas" => $Ninjas]);
    }

      

    /** 
     * @OA\Get(
     *     path="/ninjas/create",
     *     tags={"Ninjas"},
     *     @OA\Response(
     *         response=200,
     *         description="A form to create ninjas",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Ninja")
     *         )
     *     )
     * )
     *
     *
    */
    public function create()
    {       
        $dojos = Dojos::all();
        return view('ninjas.create',['dojos' => $dojos]);
    }

    /**
     * @OA\Get(
     *     path="/ninjas/{id}",
     *     summary="Show a ninja",
     *     tags={"Ninjas"},
        *    @OA\Parameter(
    *         name="id",
    *         in="path",
    *         required=true,
    *         @OA\Schema(type="integer"),
    *         description="ID of the ninja"
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Shows a ninja",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Ninja")
     *         )
     *     )
     * )
     */
    public function show(Ninja $ninja)
    {
        $ninja->load('dojo');
        return view('ninjas.show', ['ninja' => $ninja]);
    }

    /**
     *   @OA\Post(
     *     path="/ninjas",
     *     tags={"Ninjas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Ninja")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of ninjas",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Ninja")
     *         )
     *     )
     * )
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required | string | max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required | string  | min:20 |max:500',
            'dojos_id' => 'required|exists:dojos,id'
        ]);
       
        Ninja::create($validated);
        return redirect()->route('ninjas.index')->with('success_create', "Ninja : $validated[name] created successfully");

    }

   public function destroy(Ninja $ninja) {
    $ninja->delete();
    return redirect()->route('ninjas.index')->with('success_delete', "Ninja: $ninja->name deleted successfully");
   }
}
