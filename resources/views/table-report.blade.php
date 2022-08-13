<x-app-layout>
    <div class="card basic">
        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
            <div class="dataTable-top">
                <form action="#" method="GET">

                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="dataTable-dropdown"><label><select name="pagination" id="pagination" class="dataTable-selector">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>&nbsp;&nbsp;entries per page</label>
                        </div>
                        </div>
                        <div class="col">
                            <input style="display: block;" type="submit" value="go" class="btn btn-primary">

                        </div>
                    </div>


                </form>

                <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
            </div>
            <div class="dataTable-container">
                <table class="table datatable dataTable-table">
                    <thead>
                        <tr>
                            <th scope="col" data-sortable="" style="width: 5.58483%;"><a href="#"
                                    class="dataTable-sorter">First Name</a></th>
                            <th scope="col" data-sortable="" style="width: 28.1349%;"><a href="#"
                                    class="dataTable-sorter">Second Name</a></th>
                            <th scope="col" data-sortable="" style="width: 37.197%;"><a href="#"
                                    class="dataTable-sorter">Email</a></th>
                            <th scope="col" data-sortable="" style="width: 9.58904%;"><a href="#"
                                    class="dataTable-sorter">Gender</a></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($data) && $data->count())
                        @foreach($data as $register)
                        <tr>
                            <td>{{ $register->first_name }}</td>
                            <td>{{$register->last_name}}</td>
                            <td>{{ $register->email }}</td>
                            <td>{{$register->gender}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10">There are no data.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="dataTable-bottom">
                <div class="dataTable-info">Showing item {{$data->firstItem()}} to {{$data->lastItem()}} from page {{$data->currentPage()}} of total {{$data->count()}} entries</div>
                <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list"></ul>
                </nav>
            </div>
        </div>
        <div class="px-5">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-app-layout>
