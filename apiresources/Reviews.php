<?php namespace Igniter\Api\ApiResources;

use Igniter\Api\Classes\ApiController;
use Igniter\Api\Classes\ApiManager;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Reviews API Controller
 */
class Reviews extends ApiController
{
    public $restConfig = [
        'actions' => [
            'index' => [
                'pageLimit' => 20,
            ],
            'store' => [],
            'show' => [],
            'update' => [],
            'destroy' => [],
        ],
        'relations' => [
            'location',
            'customer',
        ],
        'model' => \Admin\Models\Reviews_model::class,
        'transformer' => \Igniter\Api\ApiResources\Transformers\ReviewTransformer::class,
    ];
    
    public function destroy()
    {
	    
        if (!ApiManager::instance()->currentAccessTokenIsAdmin())
	       throw new BadRequestHttpException;
		
        parent::destroy();  
	    
    }  

    
}