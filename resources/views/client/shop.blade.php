@extends('layouts.app1')

    @section('contenu')
        <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/shop')}}">Home</a></span> <span>Produit</span>
                        </p>
                        <h1 class="mb-0 bread">Products</h1>
                    </div>
                </div>
            </div>
        </div>

	  <section class="ftco-section">
		  <div class="container ">
			  <div class="row justify-content-center">
				  <div class="col-md-10 mb-5 text-center">
					  <ul class="product-category">
						  <li><a href="{{route('shop')}}" class={{$categorie_id == null ? "active" : " " }}>All</a></li>

                          @foreach($categories as $categorie)
                              <li>
                                  <a href="{{route('shopCategorie', $categorie->id)}}" class={{($categorie->id == $categorie_id) ? "active" : " " }} >
                                      {{$categorie->nom_categorie}}
                                  </a>
                              </li>
                          @endforeach
					  </ul>
                      </div>
				  </div>
			  </div>
			  <div class="container">
                  <div class="row">
                      @foreach($produitsBycategorie as $categorie_id=>$categorie)
                          @foreach($categorie as $produits)
                              @foreach($produits as $produit)
                                  <div class="col-md-6 col-lg-3 ftco-animate">
                                      <div class="product">
                                          <a href="#" class="img-prod"><img class="img-fluid" src="{{asset('storage/'.$produit->lien)}}" alt="Colorlib Template">
                                              <span class="status">30%</span>
                                              <div class="overlay"></div>
                                          </a>
                                          <div class="text py-3 pb-4 px-3 text-center">
                                              <h3><a href="#">{{$produit->nom}}</a></h3>
                                              <div class="d-flex">
                                                  <div class="pricing">
                                                      <p class="price"><span class="mr-2 price-dc">{{$produit->prix}}</span><span class="price-sale">$80.00</span></p>
                                                  </div>
                                              </div>
                                              <div class="bottom-area d-flex px-3">
                                                  <div class="m-auto d-flex">
                                                      <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                          <span><i class="ion-ios-menu"></i></span>
                                                      </a>
                                                      <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                          <span><i class="ion-ios-cart"></i></span>
                                                      </a>
                                                      <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                          <span><i class="ion-ios-heart"></i></span>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          @endforeach
                      @endforeach
                      @empty($produitsBycategorie)
                          <p>Aucun produit trouvé !</p>
                      @endempty
                  </div>
              </div>

          <div class="row mt-5">
              <div class="col text-center">
                  <div class="block-27">
                      <ul>
                          <li><a href="#">&lt;</a></li>
                          <li class="active"><span>1</span></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">&gt;</a></li>
                      </ul>
                  </div>
              </div>
          </div>

	  </section>
	@endsection


