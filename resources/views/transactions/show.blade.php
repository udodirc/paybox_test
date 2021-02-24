<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        @if ($transaction)
                        <tr>
                            <td>ID</td><td>{{ $transaction->id }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td><td>{{ $transaction->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td><td>{{ $transaction->email }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td><td>{{ $transaction->amount }}</td>
                        </tr>
                        <tr>
                            <td>Currency</td><td>{{ $transaction->amount }}</td>
                        </tr>
                        <tr>
                            <td>Date</td><td>{{ $transaction->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Link</td><td>{{ $transaction->link }}</td>
                        </tr>
                        <tr>
                            <td>Status</td><td>{{ $transaction->status }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>