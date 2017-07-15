<?php


/**
* @author Chetu(http://chetu.com/)
*
* @date: 16/05/2017
*
* @package \App\Http\Middleware
*/
namespace App\Http\Middleware;

use Closure;

/**
 * This class is used to handle request for login user permission
 *
 * @category App\Models;
 *
 * @return null
 */
class CheckPermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if (\Gate::check($permission)) {
            return $next($request);
        } else {
            return response()->view('errors.403', [], 500);
        }
        return redirect()->guest('login');
    }
}
