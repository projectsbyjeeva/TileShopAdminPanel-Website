@extends('layouts.app')

@section('title','Quotation')

@section('content')

<style>
    .quotation-wrapper{
        padding:25px;
        background:#f4f7fb;
        min-height:100vh;
    }

    .quotation-card{
        background:#fff;
        border-radius:20px;
        padding:25px;
        box-shadow:0 10px 30px rgba(0,0,0,0.05);
        border:1px solid #eef1f6;
    }

    .quotation-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
        flex-wrap:wrap;
        gap:15px;
    }

    .quotation-title h2{
        font-size:28px;
        font-weight:700;
        color:#111827;
        margin:0;
    }

    .quotation-title p{
        margin:5px 0 0;
        color:#6b7280;
        font-size:14px;
    }

    .add-btn{
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:#fff;
        padding:12px 22px;
        border-radius:12px;
        text-decoration:none;
        font-weight:600;
        transition:0.3s;
        display:inline-flex;
        align-items:center;
        gap:8px;
    }

    .add-btn:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 20px rgba(37,99,235,0.25);
        color:#fff;
    }

    .top-bar{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
        flex-wrap:wrap;
        gap:15px;
    }

    .search-box{
        position:relative;
        width:320px;
        max-width:100%;
    }

    .search-box input{
        width:100%;
        padding:12px 15px 12px 45px;
        border-radius:12px;
        border:1px solid #dbe1ea;
        outline:none;
        background:#f9fafb;
    }

    .search-box i{
        position:absolute;
        left:15px;
        top:13px;
        color:#9ca3af;
    }

    .table-responsive{
        overflow-x:auto;
    }

    .quotation-table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 12px;
    }

    .quotation-table thead th{
        background:#f3f6fb;
        padding:15px;
        font-size:14px;
        color:#374151;
        font-weight:700;
        border:none;
    }

    .quotation-table tbody tr{
        background:#fff;
        box-shadow:0 4px 15px rgba(0,0,0,0.04);
        transition:0.3s;
    }

    .quotation-table tbody tr:hover{
        transform:translateY(-2px);
    }

    .quotation-table tbody td{
        padding:18px 15px;
        vertical-align:middle;
        border-top:1px solid #f1f5f9;
        border-bottom:1px solid #f1f5f9;
    }

    .quotation-table tbody td:first-child{
        border-left:1px solid #f1f5f9;
        border-top-left-radius:14px;
        border-bottom-left-radius:14px;
    }

    .quotation-table tbody td:last-child{
        border-right:1px solid #f1f5f9;
        border-top-right-radius:14px;
        border-bottom-right-radius:14px;
    }

    .status{
        padding:7px 14px;
        border-radius:30px;
        font-size:13px;
        font-weight:600;
        display:inline-block;
    }

    .status.pending{
        background:#fff7ed;
        color:#ea580c;
    }

    .status.approved{
        background:#ecfdf5;
        color:#16a34a;
    }

    .action-btns{
        display:flex;
        gap:10px;
    }

    .icon-btn{
        width:38px;
        height:38px;
        border:none;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        transition:0.3s;
        color:#fff;
    }

    .view-btn{
        background:#0ea5e9;
    }

    .edit-btn{
        background:#f59e0b;
    }

    .delete-btn{
        background:#ef4444;
    }

    .icon-btn:hover{
        transform:scale(1.08);
    }

    @media(max-width:768px){

        .quotation-header{
            align-items:flex-start;
        }

        .quotation-title h2{
            font-size:22px;
        }

        .quotation-table{
            min-width:850px;
        }
    }
</style>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="quotation-wrapper">

    <div class="quotation-card">

        <div class="quotation-header">

            <div class="quotation-title">
                <h2>Quotation Management</h2>
                <p>Manage and track all customer quotations</p>
            </div>

            <a href="{{ url('/quotation/create') }}" class="add-btn">
                <i class="fa-solid fa-plus"></i>
                Create Quotation
            </a>

        </div>

        <div class="top-bar">

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search quotation...">
            </div>

        </div>

        <div class="table-responsive">

            <table class="quotation-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Quotation No</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>QT-1001</td>
                        <td>Arun Kumar</td>
                        <td>13-05-2026</td>
                        <td>₹ 45,000</td>
                        <td>
                            <span class="status approved">
                                Approved
                            </span>
                        </td>

                        <td>
                            <div class="action-btns">

                                <button class="icon-btn view-btn">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="icon-btn edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="icon-btn delete-btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>QT-1002</td>
                        <td>Vijay</td>
                        <td>13-05-2026</td>
                        <td>₹ 22,500</td>
                        <td>
                            <span class="status pending">
                                Pending
                            </span>
                        </td>

                        <td>
                            <div class="action-btns">

                                <button class="icon-btn view-btn">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <button class="icon-btn edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="icon-btn delete-btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection