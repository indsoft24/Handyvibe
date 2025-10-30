@extends('layouts.app')

@section('title', $service->name)

@section('content')
    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="service-image">
                                <img class="img-responsive" src="{{ asset($service->featured_image ? 'storage/' . $service->featured_image : 'images/img_bg_1.jpg') }}" alt="{{ $service->name }}">
                                
                                @if($service->gallery && count($service->gallery) > 0)
                                    <div class="service-gallery mt-3">
                                        <div class="row">
                                            @foreach($service->gallery as $image)
                                                <div class="col-md-3 col-sm-3 col-xs-6">
                                                    <img class="img-responsive thumbnail" src="{{ asset('storage/' . $image) }}" alt="{{ $service->name }}" style="cursor: pointer;" onclick="changeMainImage(this.src)">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service-details">
                                <h2>{{ $service->name }}</h2>
                                
                                @if($service->category)
                                    <p class="category"><strong>Category:</strong> {{ $service->category->name }}</p>
                                @endif
                                
                                @if($service->subCategory)
                                    <p class="subcategory"><strong>Subcategory:</strong> {{ $service->subCategory->name }}</p>
                                @endif
                                
                                <div class="price-section">
                                    @if($service->is_on_sale)
                                        <span class="old-price">₹{{ number_format($service->price, 2) }}</span>
                                        <span class="current-price">₹{{ number_format($service->current_price, 2) }}</span>
                                        <span class="discount">Save {{ $service->discount_percentage }}%</span>
                                    @else
                                        <span class="current-price">₹{{ number_format($service->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                @if($service->short_description)
                                    <div class="short-description">
                                        <p><em>{{ $service->short_description }}</em></p>
                                    </div>
                                @endif
                                
                                @if($service->description)
                                    <div class="description">
                                        <h4>Description</h4>
                                        <p>{{ $service->description }}</p>
                                    </div>
                                @endif
                                
                                @if($service->duration)
                                    <div class="service-info">
                                        <h4>Service Details</h4>
                                        <p><strong>Duration:</strong> {{ $service->duration }}</p>
                                    </div>
                                @endif
                                
                                @if($service->service_type)
                                    <div class="service-info">
                                        <p><strong>Service Type:</strong> 
                                            <span class="badge badge-{{ $service->service_type }}">
                                                {{ ucfirst(str_replace('_', ' ', $service->service_type)) }}
                                            </span>
                                        </p>
                                    </div>
                                @endif
                                
                                @if($service->features && count($service->features) > 0)
                                    <div class="features">
                                        <h4>Features</h4>
                                        <ul>
                                            @foreach($service->features as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                @if($service->requirements && count($service->requirements) > 0)
                                    <div class="requirements">
                                        <h4>Requirements</h4>
                                        <ul>
                                            @foreach($service->requirements as $requirement)
                                                <li>{{ $requirement }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="service-actions">
                                    <form action="{{ route('cart.add.service', $service) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-outline btn-lg">Book Service</button>
                                    </form>
                                    <a href="{{ route('contact') }}" class="btn btn-success btn-outline btn-lg">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($relatedServices->count() > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <span>Related Services</span>
                                <h2>You Might Also Like</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($relatedServices as $relatedService)
                                <div class="col-md-4 text-center animate-box">
                                    <div class="service-card">
                                        <div class="service-image">
                                            <img class="img-responsive" src="{{ asset($relatedService->featured_image ? 'storage/' . $relatedService->featured_image : 'images/img_bg_1.jpg') }}" alt="{{ $relatedService->name }}">
                                        </div>
                                        <div class="service-info">
                                            <h3><a href="{{ route('service.show', $relatedService->slug) }}">{{ $relatedService->name }}</a></h3>
                                            <p>{{ $relatedService->short_description }}</p>
                                            <div class="price">
                                                @if($relatedService->is_on_sale)
                                                    <span class="old-price">₹{{ number_format($relatedService->price, 2) }}</span>
                                                    ₹{{ number_format($relatedService->current_price, 2) }}
                                                @else
                                                    ₹{{ number_format($relatedService->price, 2) }}
                                                @endif
                                            </div>
                                            <p><a href="{{ route('service.show', $relatedService->slug) }}" class="btn btn-primary btn-outline">View Details</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function changeMainImage(src) {
            document.querySelector('.service-image img').src = src;
        }
    </script>

    <style>
        .price-section {
            margin: 20px 0;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 18px;
            margin-right: 10px;
        }
        
        .current-price {
            color: #e74c3c;
            font-size: 24px;
            font-weight: bold;
        }
        
        .discount {
            background: #e74c3c;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 12px;
            margin-left: 10px;
        }
        
        .thumbnail {
            border: 2px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        
        .thumbnail:hover {
            border-color: #e74c3c;
        }
        
        .description, .short-description, .service-info, .features, .requirements {
            margin: 20px 0;
        }
        
        .service-actions {
            margin: 30px 0;
        }
        
        .service-actions .btn {
            margin: 5px;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .badge-one_time {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .badge-recurring {
            background-color: #e8f5e8;
            color: #388e3c;
        }
        
        .badge-subscription {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .service-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
        }
        
        .service-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .service-card .service-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .service-card .price {
            font-weight: bold;
            color: #e74c3c;
            margin: 10px 0;
        }
        
        .service-card .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 14px;
            margin-right: 5px;
        }
    </style>
@endsection