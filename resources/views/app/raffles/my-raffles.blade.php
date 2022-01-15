@extends('layouts.app.layout')

@section('content')
    <div class="my-raffles-title">
        <h3>Minhas Rifas</h3>
    <div>
    <div class="my-raffles-body">
        <ul>
            @foreach ($raffles as $raffle)
                <li>
                    <div>
                        <span>{{$raffle->title}}</span>  
                    </div>
                    <div>
                        <div class="controls">
                            <button data-type="prev">
                                <<
                            </button>
                            <button data-type="next"  onClick='nextImage({{$raffle->images->count()}},"{{$raffle->slug}}")'>
                                >>
                            </button>
                        </div>
                        <div id="{{$raffle->slug}}">
                            @foreach ($raffle->images as $image)
                                <img src="{{Storage::url($image->path)}}" style="margin-left:0" alt="{{$image->title}}">   
                            @endforeach
                        </div>
                        
                        <div>
                            @foreach ($raffle->images as $image)
                                <span></span>   
                            @endforeach 
                        </div>
                        
                    </div>
                    <div>
                        <a href="">Mais Informações</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    
@endsection

@push('js')
    <script>
        function nextImage(imagesAmount, idImageDiv){
            totalMarginLeftImages = imagesAmount * (-176);
            
            const imageDiv =  document.getElementById(idImageDiv);
            const firstImage= imageDiv.querySelector('img');
            const marginLeftFirstImage =  firstImage.style.marginLeft;
            const marginLeftFirstImageFormated =  parseInt(marginLeftFirstImage.replace('px',''));
            const newMarginLeft =marginLeftFirstImageFormated - 176;
            if(totalMarginLeftImages < newMarginLeft){
                console.log(marginLeftFirstImageFormated)
                

                firstImage.style.marginLeft = newMarginLeft + 'px';
            }else{
                firstImage.style.marginLeft = '0px';
            }
            

            
        }
    </script>
@endpush

