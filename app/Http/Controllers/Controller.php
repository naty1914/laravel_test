<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *     title="APIs Ninja Network",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="HcH2a@example.com"
 *     )
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * ),
 * @OA\Schema(
 *     schema="Ninja",
 *     type="object",
 *     description="Ninja model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID of the ninja"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the ninja"
 *     ),
 *    @OA\Property(
 *         property="skill",
 *         type="string",
 *         description="Skill of the ninja"
 *     ),
 *     @OA\Property(
 *         property="bio",
 *         type="string",
 *         description="Biography of the ninja"
 *     ),
 *     @OA\Property(
 *         property="dojos_id",
 *         type="integer",
 *         description="ID of the dojo the ninja belongs to"
 *     )
 *  
 * )
 */
abstract class Controller
{
    //
}
