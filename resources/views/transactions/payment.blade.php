<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="col-xl-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        
                    @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                </div>
                 <div class="col-xl-12">
                    <div class="container">
                    {{ Form::open(array('url' => 'transaction/make-payment/'.$transaction->id, 'method' => 'post')) }}
                        {{ Form::token() }}
                        {{ Form::text('email', $transaction->email) }}</br>
                        <?= $errors->first('email'); ?></br>
                        {{ Form::text('phone', $transaction->phone) }}</br>
                        <?= $errors->first('phone'); ?></br>
                        {{ Form::text('amount', $transaction->amount) }}</br>
                        <?= $errors->first('amount'); ?></br>
                        {{ Form::text('card') }}</br>
                        <?= $errors->first('card'); ?></br>
                        {{ Form::text('month', 'MM') }}/{{ Form::text('year', 'YY') }}</br>
                        <?= $errors->first('month'); ?></br>
                        <?= $errors->first('year'); ?></br>
                        {{ Form::submit('Отправить') }}
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>