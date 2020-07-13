```

composer require predis/predis

===============================================================================================


/**
     * @Route("/products", name="products")
     */

     public function list(Request $request , CacheInterface $cache) {



        $cache = new RedisAdapter(

            // the object that stores a valid connection to your Redis system
            RedisAdapter::createConnection('redis://localhost:6379'),
        
            // the string prefixed to the keys of the items stored in this cache
            $namespace = 'symfony',
        
            // the default lifetime (in seconds) for cache items that do not define their
            // own lifetime, with a value 0 causing items to be stored indefinitely (i.e.
            // until RedisAdapter::clear() is invoked or the server(s) are purged)
            $defaultLifetime = 0
        );






      $data = $cache->get('data' , function() {

        $repository = $this->getDoctrine()->getRepository(Product::class);

        $data = $repository->findAll() ;

        return $data ;

      } ) ;
      
      
      
       return $this->render('product/list.html.twig', [

            'products' => $data
        ]);

     }




```
