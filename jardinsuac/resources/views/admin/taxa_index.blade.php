@extends('admin.master')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <h1 style="text-align: center">TAXAS DE PORTE</h1>

    <div class="accordion accordion-flush" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    </div>


    <div id="listTaxas" class="row row-cols-1 row-cols-md-3 g-4 " style="max-width: 80%; position: relative; float:right;">
    @foreach($taxas as $taxa)
        <div class="card mb-3" style="max-width: 540px; margin: 5px">
            <div class="row g-0">
                    <div class="card-body">
                        <h5 class="card-title">{{$taxa->CommonName}}</h5>
                        <h6 class="card-subtitle">{{$taxa->ScientificName}}</h6>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <button type="button" class="btn" >Saber Mais</button>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>

            </div>
        </div>
    @endforeach
    </div>
@endsection


