<?php ?>

@extends('layouts.main')

@section('content')
    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Add New Contact</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="first_name" id="first_name"
                                                   class="form-control is-invalid" value="{{$contact->first_name}}">
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                   value="{{$contact->last_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" class="form-control"
                                                   value="{{$contact->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                   value="{{$contact->phone}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label">Address</label>
                                        <div class="col-md-9">
                                            <textarea name="address" id="address" rows="3" class="form-control">
                                                {{$contact->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="company_id" class="col-md-3 col-form-label">Company</label>
                                        <div class="col-md-9">
                                            <select name="company_id" id="company_id" class="form-control">
                                                <option value="">Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="1">{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

