@extends('layouts.admin_master')
@section('content')

    

        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    
                    <h3>Print Sale Of Goods</h3>
                    <form>
                        <div class="form-group">
                            <label for="label">Start Date </label>
                            <input type="date" class="form-control" name="startDate" id="startDate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="label">End Date </label>
                            <input type="date" name="endDate" id="endDate" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <a href="#" onclick="this.href='/stock-by-date/'+ document.getElementById('startDate').value + '/' + document.getElementById('endDate').value" 
                                target="_blank" class="btn btn-primary col-md-12">
                                Print Sale Of Goods By Date  
                                <i class="fas fa-print"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
@endsection