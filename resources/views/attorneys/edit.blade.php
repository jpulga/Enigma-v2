@extends('layouts.app')

@section('content')
<div id="invoice">
    <form action="{{ route('attorneys.update', $attorney->id) }}" method="POST" class="form-invoices">
        <div class="container my-4 ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Edit Attorney</h4></div>
                        <div class="card-body">
                            @include('attorneys.form_edit')
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </form>
</div> 
@endsection

@push('scripts')
    <script src="/js/vue.min.js"></script>
    <script src="/js/vue-resource.min.js"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {!! $attorney->toJson() !!};
    </script>
    <script src="/js/app.js"></script>
@endpush