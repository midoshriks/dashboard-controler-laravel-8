@extends('layouts.dashboard.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        {{-- @mido_shriks show errors --}}
        @include('partials._errors')

        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ display('Smart bucks') }}
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ display('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.orders.index') }}">{{ display('Order') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ display('Data orders tables') }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ display('No.Orders') }}</th>
                                        <th>{{ display('name users') }}</th>
                                        <th>{{ display('payment') }}</th>
                                        <th>{{ display('product') }}</th>
                                        <th>{{ display('type') }}</th>
                                        <th>{{ display('amount') }}</th>
                                        <th>{{ display('total') }}</th>
                                        <th>{{ display('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $order->order_numper }}</td>
                                            <td>{{ $order->users->first_name }}</td>
                                            <td>{{ $order->payment_method_id }}</td>
                                            {{-- @dd($order->products->helper_id == null ? $order->products->type->name : $order->products->helper->name) --}}
                                            <td>
                                                {{-- {{ $order->products->helper_id == null ? $order->products->type->name : $order->products->helper->name }} --}}
                                                @if ($order->products->helper_id == null)
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-coin-bitcoin"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <circle cx="12" cy="12" r="9">
                                                                </circle>
                                                                <path
                                                                    d="M9 8h4.09c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2h-4.09">
                                                                </path>
                                                                <path d="M10 12h4"></path>
                                                                <path d="M10 7v10v-9"></path>
                                                                <path d="M13 7v1"></path>
                                                                <path d="M13 16v1"></path>
                                                            </svg>
                                                            <span
                                                                class="status status-yellow">{{ $order->products->type->name }}</span>
                                                        </div>
                                                    </div>
                                                @else<div class="datagrid-item">
                                                        <div class="datagrid-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-help" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <circle cx="12" cy="12" r="9">
                                                                </circle>
                                                                <line x1="12" y1="17" x2="12"
                                                                    y2="17.01">
                                                                </line>
                                                                <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4">
                                                                </path>
                                                            </svg>
                                                            <span
                                                                class="status status-vk">{{ $order->products->helper->name }}</span>

                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->type->name == 'confirm')
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-check" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M5 12l5 5l10 -10"></path>
                                                            </svg>
                                                            <span
                                                                class="status status-green">{{ $order->type->name }}</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="datagrid-item">
                                                        <div class="datagrid-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-hourglass"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M6.5 7h11"></path>
                                                                <path d="M6.5 17h11"></path>
                                                                <path
                                                                    d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z">
                                                                </path>
                                                                <path
                                                                    d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z">
                                                                </path>
                                                            </svg>
                                                            <span
                                                                class="status status-red">{{ $order->type->name }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            {{-- @dd($order->users->wallets) seeder --}}
                                            {{-- @dd($order->products->type->id) --}}
                                            <td> {{ $order->amount }} </td>
                                            <td> {{ $order->total }} </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label class="form-check form-switch">
                                                        <!-- Rounded switch -->
                                                        <label class="switch">
                                                            <input class="form-check-input btn-active" type="checkbox"
                                                                {{ $order->type->name == 'confirm' ? 'checked' : '' }}
                                                                data-form-id="order-active-{{ $order->id }}"
                                                                data-name-item="{{ $order->order_numper }}">
                                                        </label>

                                                        <form id="order-active-{{ $order->id }}" style="display: none"
                                                            action="{{ route('dashboard.order.active', $order->id) }}"
                                                            {{-- action="{{ route('dashboard.users.update', $user->id) }}" --}} method="POST"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="type_id"
                                                                value="{{ $order->type->name == 'confirm' ? 9 : 10 }}">
                                                            <input type="submit" value="save">
                                                        </form>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
