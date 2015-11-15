@extends('layout.master')

@section('content')
    <div class="container">


        <div class="panel panel-default">

            <div class="panel-body">

                @include('partials.errors')
                @include('partials.success')

                @if(!empty($user))
                    <div class="col-md-6">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="2">Account Information <em>Updated: {{ $user->updated_at->diffForHumans() }}</em> </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Username</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <?php
                                    $firstname = '';
                                    $lastname = '';
                                    $address = '';
                                    $contact_no = '';
                            if (!empty($profile)) {
                                $firstname = $profile->first_name;
                                $lastname = $profile->last_name;
                                $address = $profile->address;
                                $contact_no = $profile->contact_no;
                            }
                            ?>
                            <tr>
                                <td>First Name</td>
                                <td>{{ $firstname }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $lastname }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $address }}</td>
                            </tr>
                            <tr>
                                <td>Contact No</td>
                                <td>{{ $contact_no }}</td>
                            </tr>

                            <tr>
                                <td>Date Registered</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-6">

                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th colspan="2">Number of Posts</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>All</td>
                                <td> {{ $posts->all }}</td>
                            </tr>

                            <tr>
                                <td>Active</td>
                                <td>{{ $posts->active }}</td>
                            </tr>

                            <tr>
                                <td>Deleted</td>
                                <td>{{ $posts->deleted }}</td>
                            </tr>

                            <tr>
                                <td>Reported</td>
                                <td>0</td>
                            </tr>


                            </tbody>

                        </table>

                    </div>
                @endif

            </div>

        </div>

    </div>
@stop