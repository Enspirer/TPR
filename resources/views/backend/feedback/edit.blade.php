@extends('backend.layouts.app')

@section('title', __('Status'))

@section('content')
    
    <form action="{{route('admin.feedbacks.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="row">
                                        
                                <div class="row pe-0">
                                    <div class="col-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="16%" style="font-weight: 600; font-size:15px;">Topic:</td>
                                                    <td style="font-size:15px;">{{ $feedback->topic }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:15px;">Stars:</td>
                                                    @if($feedback->stars == '1 Star')
                                                        <td style="font-size:15px;"><span class="badge badge-danger">1 Star</span></td>
                                                    @endif
                                                    @if($feedback->stars == '2 Stars')
                                                        <td style="font-size:15px;"><span class="badge badge-info">2 Stars</span></td>
                                                    @endif
                                                    @if($feedback->stars == '3 Stars')
                                                        <td style="font-size:15px;"><span class="badge badge-info">3 Stars</span></td>
                                                    @endif
                                                    @if($feedback->stars == '4 Stars')
                                                        <td style="font-size:15px;"><span class="badge badge-success">4 Stars</span></td>
                                                    @endif
                                                    @if($feedback->stars == '5 Stars')
                                                        <td style="font-size:15px;"><span class="badge badge-success">5 Stars</span></td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:15px;">First Time Buyer/Seller:</td>
                                                    <td style="font-size:15px;">{{ $feedback->buyer_seller }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:15px;">Stage in the Property Buying:</td>
                                                    <td style="font-size:15px;">{{ $feedback->stage_property }}</td>
                                                </tr>
                                                @if($feedback->comment_question != null)
                                                    <tr>
                                                        <td style="font-weight: 600; font-size:15px;">Comment Question:</td>
                                                        <td style="font-size:15px;">{{ $feedback->comment_question }}</td>
                                                    </tr>
                                                @endif
                                                @if($feedback->suggestion != null)
                                                    <tr>
                                                        <td style="font-weight: 600; font-size:15px;">Suggestion:</td>
                                                        <td style="font-size:15px;">{{ $feedback->suggestion }}</td>
                                                    </tr>
                                                @endif
                                                @if($feedback->issues != null)
                                                    <tr>
                                                        <td style="font-weight: 600; font-size:15px;">Issues:</td>
                                                        <td style="font-size:15px;">{{ $feedback->issues }}</td>
                                                    </tr>
                                                @endif
                                                @if($feedback->provided_details != null)
                                                    <tr>
                                                        <td style="font-weight: 600; font-size:15px;">Provided Details:</td>
                                                        <td style="font-size:15px;">{{ $feedback->provided_details }}</td>
                                                    </tr>
                                                @endif

                                            </tbody>                                            
                                        </table>
                                    </div>                                            
                                            
                                </div>
                            </div>                            

                            <div class="mt-5 text-right">
                                <input type="hidden" name="hidden_id" value="{{ $feedback->id }}"/>
                                <a href="{{route('admin.feedbacks.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                @if($feedback->status == 'Seen')
                                @else
                                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Seen" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>






<br><br>
@endsection
