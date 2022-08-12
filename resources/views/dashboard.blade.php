<x-app-layout>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Upload CSV report file</h5>

            <!-- General Form Elements -->
            <form method="POST" action="{{ route('report.store')}}">
                @csrf
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>

            </form><!-- End General Form Elements -->

        </div>
    </div>

</x-app-layout>
