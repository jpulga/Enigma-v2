@extends('layouts.app')

@section('content')

<div id="invoice">
    <form action="{{ route('attorneys.store') }}" method="POST" class="form-invoice">
        <div class="container my-4 ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Create Attorney</h4></div>
                        <div class="card-body">
                            @include('attorneys.form')
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

    window._form = {
        first_name: '',
        middle_name: '',
        last_name: '',
        dob: '',
        products: [{
            first_name: '',
            middle_name: '',
            last_name: '',
            dob:''
        }]
    };
</script>
<script src="/js/app.js"></script>
@endpush