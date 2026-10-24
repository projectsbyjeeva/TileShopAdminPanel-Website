@extends('layouts.app')

@section('title','Create Quotation')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

    /* body{
        background:
        linear-gradient(135deg,#081028 0%,#0f1d45 50%,#5b21b6 100%);
        min-height:100vh;
    } */

    .quotation-page{
        padding:30px;
    }

    .quotation-form-card{
        background:rgba(255,255,255,0.92);
        backdrop-filter:blur(12px);
        border-radius:28px;
        padding:30px;
        box-shadow:0 15px 40px rgba(0,0,0,0.12);
        border:1px solid rgba(255,255,255,0.25);
    }

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .page-title h2{
        font-size:34px;
        font-weight:800;
        margin:0;
        color:#081028;
    }

    .page-title p{
        margin:6px 0 0;
        color:#6b7280;
        font-size:15px;
    }

    .save-btn{
        border:none;
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        color:#fff;
        padding:14px 30px;
        border-radius:14px;
        font-weight:700;
        font-size:15px;
        transition:0.3s;
        box-shadow:0 10px 25px rgba(37,99,235,0.25);
    }

    .save-btn:hover{
        transform:translateY(-2px);
    }

    .section-card{
        background:#fff;
        border-radius:24px;
        padding:28px;
        margin-bottom:28px;
        border:1px solid #eef2ff;
        box-shadow:0 5px 20px rgba(0,0,0,0.04);
    }

    .section-header{
        display:flex;
        align-items:center;
        gap:15px;
        margin-bottom:25px;
    }

    .section-icon{
        width:55px;
        height:55px;
        border-radius:16px;
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:22px;
        box-shadow:0 10px 20px rgba(37,99,235,0.20);
    }

    .section-header h4{
        margin:0;
        font-size:24px;
        font-weight:700;
        color:#111827;
    }

    .section-header p{
        margin:4px 0 0;
        color:#6b7280;
        font-size:14px;
    }
.form-label{
        font-weight:700;
        margin-bottom:10px;
        color:#374151;
        font-size:14px;
    } 

     .form-control,
    .form-select{
        height:52px;
        border-radius:14px;
        border:1px solid #dbe3f0;
        background:#f8fafc;
        padding-left:16px;
        box-shadow:none !important;
        transition:0.3s;
    } 

    textarea.form-control{
        height:auto;
        padding-top:14px;
    }

    .form-control:focus,
    .form-select:focus{
        border-color:#7c3aed;
        background:#fff;
    } 

    .tile-table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 14px;
    }

    .tile-table thead th{
        background:#eef2ff;
        padding:16px;
        font-size:14px;
        font-weight:700;
        color:#374151;
        border:none;
    }

    .tile-table tbody tr{
        background:#fff;
        transition:0.3s;
    }

    .tile-table tbody tr:hover{
        transform:translateY(-2px);
    }

    .tile-table tbody td{
        padding:14px;
        border-top:1px solid #eef2ff;
        border-bottom:1px solid #eef2ff;
        background:#fff;
    }

    .tile-table tbody td:first-child{
        border-left:1px solid #eef2ff;
        border-top-left-radius:16px;
        border-bottom-left-radius:16px;
    }

    .tile-table tbody td:last-child{
        border-right:1px solid #eef2ff;
        border-top-right-radius:16px;
        border-bottom-right-radius:16px;
    }

    .tile-table input,
    .tile-table select{
        width:100%;
        height:46px;
        border-radius:12px;
        border:1px solid #dbe3f0;
        background:#f8fafc;
        padding:0 12px;
        outline:none;
    }

    .add-row-btn{
        border:none;
        background:linear-gradient(135deg,#16a34a,#22c55e);
        color:#fff;
        padding:13px 24px;
        border-radius:14px;
        font-weight:700;
        transition:0.3s;
    }

    .add-row-btn:hover{
        transform:translateY(-2px);
    }

    .delete-btn{
        width:44px;
        height:44px;
        border:none;
        border-radius:12px;
        background:linear-gradient(135deg,#ef4444,#dc2626);
        color:#fff;
    }

    .summary-card{
        background:linear-gradient(135deg,#081028,#1e3a8a);
        border-radius:24px;
        padding:30px;
        color:#fff;
    }

    .summary-title{
        font-size:24px;
        font-weight:700;
        margin-bottom:25px;
    }

    .summary-item{
        display:flex;
        justify-content:space-between;
        margin-bottom:18px;
        font-size:16px;
        opacity:0.95;
    }

    .summary-item.total{
        border-top:1px dashed rgba(255,255,255,0.3);
        padding-top:18px;
        margin-top:18px;
        font-size:24px;
        font-weight:800;
    }

    @media(max-width:768px){

        .quotation-page{
            padding:15px;
        }

        .page-title h2{
            font-size:26px;
        }

        .tile-table{
            min-width:1200px;
        }

        .quotation-form-card{
            padding:18px;
        }
    }

    /* =========================================
   TILE DETAILS CARD
========================================= */

.tile-details-card{

    background:#ffffff;

    border-radius:30px;

    overflow:hidden;

    border:
    1px solid #1170ec;

    box-shadow:
    0 12px 35px rgba(15,23,42,0.06);

    margin-bottom:30px;

}


/* HEADER */

/* .tile-card-header{

    padding:20px 12px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );

    position:relative;

    overflow:hidden;

} */

    .is-invalid{
    border:1px solid red !important;
}

.error-text{
    font-size:12px;
    margin-top:4px;
    display:block;
}


.tile-card-header::before{

    content:'';

    position:absolute;

    width:220px;
    height:220px;

    background:
    rgba(255,255,255,0.08);

    border-radius:50%;

    top:-80px;
    right:-60px;

}


.tile-header-left{

    display:flex;

    align-items:center;

    gap:18px;

    position:relative;

    z-index:2;

}


/* ICON */

.tile-icon{

    width:64px;

    height:64px;
    border-radius:10px;

    background:
    rgba(255,255,255,0.18);

    backdrop-filter:blur(10px);

    display:flex;

    justify-content:center;

    align-items:center;

    color:#ffffff;

    font-size:24px;

}


/* TITLE */

.tile-title{

    color:black;

    margin:0;

    font-size:34px;

    font-weight:600;

    letter-spacing:-0.5px;

}


.tile-subtitle{

    margin-top:6px;

    color:
    rgba(16, 39, 243, 0.85);

    font-size:14px;

    font-weight:500;

}


/* BODY */

.tile-card-body{

    padding:30px;

    background:#f8fafc;

}


/* LABEL */

.form-label{

    font-size:13px;

    font-weight:700;

    color:#334155;

    margin-bottom:10px;

}


/* INPUT */

.modern-input{

    height:54px;

    border-radius:16px;

    border:
    1px solid #dbe4f0;

    background:#ffffff;

    padding:0 16px;

    font-size:14px;

    font-weight:600;

    color:#0f172a;

    transition:0.3s;

    box-shadow:none !important;

}


.modern-input:focus{

    border-color:#6366f1;

    box-shadow:
    0 0 0 4px rgba(99,102,241,0.10) !important;

}


/* BUTTON */

.add-row-btn{

    border:none;

    height:54px;

    padding:0 24px;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #16a34a,
        #22c55e
    );

    color:#ffffff;

    font-size:15px;

    font-weight:700;

    transition:0.3s;

    box-shadow:
    0 10px 20px rgba(34,197,94,0.25);

}


.add-row-btn:hover{

    transform:translateY(-2px);

}


/* RESPONSIVE */

@media(max-width:992px){

    .tile-title{

        font-size:28px;

    }

}


@media(max-width:768px){

    .tile-card-header{

        padding:22px;

    }

    .tile-card-body{

        padding:22px;

    }

    .tile-header-left{

        flex-direction:column;

        align-items:flex-start;

    }

}
/* CUSTOMER CARD */

.customer-card{
    padding:32px;
    border-radius:26px;
    background:
    linear-gradient(135deg,#ffffff,#f8fbff);
    border:1px solid #edf2ff;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.customer-header{
    margin-bottom:28px;
}

.customer-form-row{
    display:flex;
    gap:18px;
    align-items:end;
    flex-wrap:wrap;
}

.customer-field{
    flex:1;
    min-width:220px;
}

.address-field{
    flex:1.5;
}

.customer-field .form-label{
    font-size:14px;
    font-weight:700;
    color:#374151;
    margin-bottom:10px;
}

.customer-field .form-control{
    height:54px;
    border-radius:16px;
    border:1px solid #dbe4f0;
    background:#f9fbff;
    padding:0 18px;
    font-size:14px;
    transition:0.3s;
}

.customer-field .form-control:focus{
    border-color:#7c3aed;
    background:#fff;
    box-shadow:
    0 0 0 4px rgba(124,58,237,0.08) !important;
}

@media(max-width:992px){

    .customer-form-row{
        flex-direction:column;
    }

    .customer-field{
        width:100%;
    }

}


.line-card{

    background:#fff;

    border-radius:18px;

    padding:25px;

    border:1px solid #ececec;

    box-shadow:0 4px 18px rgba(0,0,0,0.06);
}

.line-card-header{

    font-size:18px;

    font-weight:700;

    margin-bottom:25px;

    color:#111827;
}

.mini-line-card{

    border-radius:16px;

    padding:20px;

    color:#fff;
}

.dark-card{

    background:linear-gradient(135deg,#111827,#374151);
}

.light-card{

    background:linear-gradient(135deg,#2563eb,#60a5fa);
}

.high-card{

    background:linear-gradient(135deg,#7c3aed,#c084fc);
}

.mini-line-card h5{

    font-size:18px;

    margin-bottom:18px;
}

.mini-line-card .form-control{

    border:none;

    height:46px;

    border-radius:12px;
}

/* =========================================
   SUB LIST TABLE UI
========================================= */

.sublist-wrapper{

    background:#ffffff;

    border-radius:28px;

    padding:25px;

    margin-top:30px;

    border:1px solid #e8eefc;

    box-shadow:
    0 10px 30px rgba(15,23,42,0.05);
}

.sublist-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:25px;

    flex-wrap:wrap;

    gap:15px;
}

.sublist-header h4{

    margin:0;

    font-size:24px;

    font-weight:700;

    color:#111827;
}

.sublist-header p{

    margin:6px 0 0;

    color:#6b7280;

    font-size:14px;
}

.sublist-count{

    background:
    linear-gradient(135deg,#2563eb,#7c3aed);

    color:#fff;

    padding:10px 18px;

    border-radius:14px;

    font-weight:700;

    font-size:14px;
}

.modern-subtable{

    width:100%;

    border-collapse:separate;

    border-spacing:0 16px;
}

.modern-subtable thead th{

    background:#f1f5ff;

    padding:16px;

    font-size:13px;

    font-weight:800;

    color:#374151;

    border:none;

    white-space:nowrap;
}

.modern-subtable thead th:first-child{

    border-top-left-radius:14px;

    border-bottom-left-radius:14px;
}

.modern-subtable thead th:last-child{

    border-top-right-radius:14px;

    border-bottom-right-radius:14px;
}

.modern-subtable tbody tr{

    background:#fff;

    transition:0.3s;
}

.modern-subtable tbody tr:hover{

    transform:translateY(-3px);
}

.modern-subtable tbody td{

    padding:18px 16px;

    vertical-align:middle;

    border-top:1px solid #edf2ff;

    border-bottom:1px solid #edf2ff;

    background:#fff;
}

.modern-subtable tbody td:first-child{

    border-left:1px solid #edf2ff;

    border-top-left-radius:18px;

    border-bottom-left-radius:18px;
}

.modern-subtable tbody td:last-child{

    border-right:1px solid #edf2ff;

    border-top-right-radius:18px;

    border-bottom-right-radius:18px;
}

.tile-badge{

    padding:10px 16px;

    border-radius:12px;

    font-size:13px;

    font-weight:700;

    display:inline-block;
}

.tile-badge.floor{

    background:#dcfce7;

    color:#166534;
}

.tile-badge.wall{

    background:#dbeafe;

    color:#1d4ed8;
}

.tile-badge.bath{

    background:#ede9fe;

    color:#6d28d9;
}

.design-info{

    display:flex;

    align-items:center;

    gap:12px;
}

.design-icon{

    width:48px;

    height:48px;

    border-radius:14px;

    background:
    linear-gradient(135deg,#2563eb,#7c3aed);

    color:#fff;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:18px;
}

.design-info h6{

    margin:0;

    font-size:14px;

    font-weight:700;

    color:#111827;
}

.design-info small{

    color:#6b7280;
}

.size-chip{

    background:#f3f4f6;

    padding:10px 14px;

    border-radius:10px;

    font-size:13px;

    font-weight:700;
}

.amount-box{

    font-size:16px;

    font-weight:800;

    color:#16a34a;
}

.action-btn{

    width:42px;

    height:42px;

    border:none;

    border-radius:12px;

    color:#fff;

    margin:0 3px;

    transition:0.3s;
}

.edit-btn{

    background:
    linear-gradient(135deg,#2563eb,#3b82f6);
}

.delete-btn{

    background:
    linear-gradient(135deg,#ef4444,#dc2626);
}

.action-btn:hover{

    transform:translateY(-2px);
}

@media(max-width:992px){

    .modern-subtable{

        min-width:950px;
    }
}

.line-mini-details{

    display:flex;

    flex-direction:column;

    gap:6px;

    margin-top:10px;
}

.line-mini-details span{

    font-size:12px;

    font-weight:700;

    padding:6px 10px;

    border-radius:10px;

    width:fit-content;
}

.dark-mini{

    background:#111827;

    color:#fff;
}

.light-mini{

    background:#2563eb;

    color:#fff;
}

.high-mini{

    background:#7c3aed;

    color:#fff;
}
.quotation-no-box{

    display:flex;

    align-items:center;

    gap:10px;

    padding:12px 18px;

    background:#f8fafc;

    border:1px solid #dbeafe;

    border-radius:14px;

    width:fit-content;

    margin-bottom:20px;

}

.quotation-label{

    font-size:15px;

    font-weight:600;

    color:#374151;

}

.quotation-value{

    font-size:18px;

    font-weight:800;

    color:#2563eb;

    letter-spacing:1px;

}

</style>


<div class="quotation-page">

    <div class="quotation-form-card">

        <!-- HEADER -->

        <div class="page-header">

            <div class="page-title">
                <h2>Create Quotation</h2>
                <!-- <p>Create customer quotation with stylish modern UI</p> -->
            </div>

            <div class="quotation-no-box">

    <span class="quotation-label">
        Quotation No :
    </span>

    <span class="quotation-value" id="quotation_no">
        QUOT260519006
    </span>

</div>

            <!-- <label class="text"   id="quotation_no"></label> -->

            <!-- <button class="save-btn">
                <i class="fa-solid fa-floppy-disk me-2"></i>
                Save Quotation
            </button> -->

        </div>

        <!-- <span id="quotation_no"></span> -->

        <input type="hidden" id="screen_id">

<!-- CUSTOMER DETAILS -->

<div class="section-card customer-card">

    <div class="section-header customer-header">

        <div class="section-icon">
            <i class="fa-solid fa-user"></i>
        </div>

        <div>
            <h4>Customer Details</h4>
            <p>Enter customer information</p>
        </div>

    </div>

    <div class="customer-form-row">

        <div class="customer-field">
            <label class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer" id="customer" placeholder="Enter customer name">
        </div>

        <div class="customer-field">
            <label class="form-label">Mobile Number</label>
            <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter mobile number">
        </div>

        <div class="customer-field">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
        </div>

        <div class="customer-field address-field">
            <label class="form-label">Address</label>
           <textarea class="form-control" name="address" id="address"></textarea>
        </div>

    </div>

</div>

<!-- TILE DETAILS -->
<!-- TILE DETAILS CARD -->

<div class="tile-details-card">

    <!-- HEADER -->

    <div class="tile-card-header">

        <div class="tile-header-left">

            <div class="tile-icon">

                <i class="fa-solid fa-border-all"></i>

            </div>

            <div>

                <h3 class="tile-title">
                    Tile Details
                </h3>

                <p class="tile-subtitle">
                    Add tile measurements, size, quantity and quotation details
                </p>

            </div>

        </div>

    </div>


    <!-- BODY -->

    <div class="tile-card-body">

        <div class="row g-4 align-items-end">

            <!-- TILE CATEGORY -->

            <div class="col-lg-2">

                <label class="form-label">
                    Tile Category
                </label>

                <select
                    class="form-control modern-input"
                    name="tile_categ"
                    id="tile_categ"
                    onchange="get_tilesize();allresetvalue();"
                >
                    <option value="">
                        Select Category
                    </option>

                    <option value="Floor Tile">
                        Floor Tile
                    </option>

                    <option value="Wall Tile">
                        Wall Tile
                    </option>

                    <option value="Bathroom Tile">
                        Bathroom Tile
                    </option>

                    <option value="Kitchen Tile">
                        Kitchen Tile
                    </option>

                </select>

            </div>


            <!-- TILE SIZE -->

            <div class="col-lg-2">

                <label class="form-label">
                    Tile Size
                </label>

                <select class="form-control modern-input" name="tile_size" id="tile_size" onchange="allresetvalue()"
                >

                    <option value="">
                        Select Size
                    </option>

                </select>

            </div>


            <!-- WIDTH / HEIGHT -->

            <div
                class="col-lg-2 d-none align-items-end gap-2"
                id="len_div"
            >

                <div style="width:48%;">

                    <label class="form-label">
                        Width
                    </label>

                    <input
                        type="text" id="width"
                        class="form-control modern-input"
                        placeholder="W" oninput="calculate()"
                    >

                </div>

                <div style="width:48%;">

                    <label class="form-label">
                        Height
                    </label>

                    <input
                        type="text" id="height"
                        class="form-control modern-input"
                        placeholder="H" oninput="calculate()"
                    >

                </div>

            </div>


            <!-- SQ FT -->

            <div class="col-lg-1">

                <label class="form-label">
                    Sq.ft
                </label>

                <input
                    type="text" id="sq_ft"
                    class="form-control modern-input"
                    placeholder="0" oninput="calculate()"
                >

            </div>


            <!-- RATE -->

            <div class="col-lg-1">

                <label class="form-label">
                    Rate
                </label>

                <input
                    type="text" id="rate" oninput="calculateAmount()"
                    class="form-control modern-input"
                    placeholder="₹"
                >

            </div>


            <!-- TOTAL BOX -->

            <div class="col-lg-2">

                <label class="form-label">
                    Total Box
                </label>

                <input
                    type="text" id="total_box"  oninput="calculateAmount()"
                    class="form-control modern-input"
                    placeholder="0"
                >

            </div>


            <!-- AMOUNT -->

            <div class="col-lg-2">

                <label class="form-label">
                    Amount
                </label>

                <input
                    type="text" id="amount"
                    class="form-control modern-input"
                    placeholder="₹ 0.00"
                >

            </div>

        </div>
        <div  class="row g-4 align-items-end">

         <div class="col-lg-2">

                <label class="form-label">
                    Design Name
                </label>

                <input
                    type="text" id="design_name"
                    class="form-control modern-input"
                    placeholder="Design Name"
                >

            </div>
        </div>




        <!-- DESIGN LINE SECTION -->

<div class="row mt-4 d-none" id="design_line_section">

    <div class="col-lg-12">

        <div class="line-card">

            <div class="line-card-header">
                <i class="fa-solid fa-layer-group"></i>
                <span  id="bathkitch_label">Bathroom / Kitchen Line Calculation</span>
            </div>

            <div class="row g-4">

                <!-- DARK -->

                <div class="col-lg-4">

                    <div class="mini-line-card dark-card">

                        <h5>Dark Line</h5>

                        <label>Line</label>

                        <input type="number"
                               id="dark_line"
                               class="form-control"
                               oninput="updateLines('dark')">

                        <label class="mt-3">Dark Box</label>

                        <input type="text"
                               id="dark_box"
                               class="form-control" oninput="calculate_totalbox()"
                               >

                    </div>

                </div>


                <!-- LIGHT -->

                <div class="col-lg-4">

                    <div class="mini-line-card light-card">

                        <h5>Light Line</h5>

                        <label>Line</label>

                        <input type="number"
                               id="light_line"
                               class="form-control"
                               oninput="updateLines('light')">

                        <label class="mt-3">Light Box</label>

                        <input type="text"
                               id="light_box"
                               class="form-control" oninput="calculate_totalbox()"
                               >

                    </div>

                </div>


                <!-- HIGHLIGHTER -->

                <div class="col-lg-4">

                    <div class="mini-line-card high-card">

                        <h5>Highlighter Line</h5>

                        <label>Line</label>

                <input type="number"  id="highlighter_line" class="form-control" oninput="updateLines('highlighter')">

                        <label class="mt-3">Highlighter Box</label>

                        <input type="text"
                               id="highlighter_box"
                               class="form-control" oninput="calculate_totalbox()">

                    </div>

                </div>

            </div>

        </div>




    </div>

</div>
<input type="hidden" id="sub_uniqueid">


        <!-- BUTTON -->

        <div class="row mt-4">

            <div class="col-12 d-flex justify-content-end">

                <button class="add-row-btn" onclick="add_tile()">

                    <i class="fa-solid fa-plus me-2"></i>

                    Add Tile

                </button>

            </div>

        </div>

            <div class="table-responsive">

        <table class="modern-subtable" id="sublist_table">

            <thead>

                <tr>
                    <th>S.No</th>
                    <th>Tile Category</th>
                     <th>Design Name</th>
                    <th>Sq.ft</th>
                    <th>Box</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody id="sublist_data">

                <!-- <tr> -->

                    <!-- <td>
                        <span class="tile-badge floor">
                            Floor Tile
                        </span>
                    </td>

                    <td>

                        <div class="design-info">

                            <div class="design-icon">
                                <i class="fa-solid fa-border-all"></i>
                            </div>

                            <div>
                                <h6>Premium Marble</h6>
                                <small>Modern Design</small>
                            </div>

                        </div>

                    </td>

                    <td>
                        <span class="size-chip">
                            2x2
                        </span>
                    </td>

                    <td>
                        120
                    </td>

                    <td>
                        7.50
                    </td>

                    <td>
                        ₹ 45
                    </td>

                    <td>

                        <div class="amount-box">
                            ₹ 5,400
                        </div>

                    </td> -->

                    <!-- <td class="text-center">

                        <button class="action-btn edit-btn">
                            <i class="fa-solid fa-pen"></i>
                        </button>

                        <button class="action-btn delete-btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </td> -->

                <!-- </tr> -->

            </tbody>

        </table>

    </div>

    </div>

</div>


        <div class="summary-card">

            <div class="summary-title">
                Quotation Summary
            </div>

            <!-- <div class="summary-item">
                <span>Sub Total</span>
                <strong>₹ 0.00</strong>
            </div>

            <div class="summary-item">
                <span>Tax Amount</span>
                <strong>₹ 0.00</strong>
            </div>

            <div class="summary-item">
                <span>Discount</span>
                <strong>₹ 0.00</strong>
            </div> -->

            <div class="summary-item total">
                <span>Grand Total</span>
                <strong><span id="sub_totalamount">₹ 0.00</span></strong>
            </div>

        </div>




  <div class="summary-btn-section">

        <button type="button" class="save-btn" onclick="main_submit()">
            <i class="fa-solid fa-floppy-disk"></i>
            Save
        </button>

        <button type="button" class="cancel-btn" onclick='window.location.href="{{url('/quotation')}}"'>
            <i class="fa-solid fa-xmark"></i>
            Cancel
        </button>

    </div>
</div>



        <!-- SUMMARY -->


    </div>

</div>
<!--  -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>



function  get_tilesize(){

    var tile_categ  = $('#tile_categ').val();
    var tile_size   = $('#tile_size').val();

    let sizes = {
        
        'Floor Tile': [
            '2x2',
            '4x2',
            '1x1'
        ],

         'Wall Tile': [
            '2x2',
            '4x2',
            '18x12',
            '2x1'
        ],
         'Kitchen Tile': [
       
            '18x12',
            '2x1'
        ],

         'Bathroom Tile': [
            '18x12',
            '2x1'
        ]

    };

    let options =
    `<option value="">Select Tile Size</option>`;


    if(sizes[tile_categ]) {

        sizes[tile_categ].forEach(function(size){

        options +=
        `<option value="${size}">${size}</option>`;
        });
    }

    $('#tile_size').html(options);

    if(tile_categ == 'Wall Tile' || tile_categ == 'Floor Tile'){

    $('#len_div').addClass('d-none').removeClass('d-flex');
     $('#design_line_section')
        .addClass('d-none');

    }

    else{
       
     $('#len_div').addClass('d-flex').removeClass('d-none');
       $('#design_line_section')
        .removeClass('d-none');
    }

    if(tile_categ == 'Bathroom Tile'){

            $('#bathkitch_label').text('Bathroom Line Calculation');
    }
    else if(tile_categ == 'Kitchen Tile'){

            $('#bathkitch_label').text('Kitchen Line Calculation');
    }

    }





    function calculate(){

    var tile_categ = $('#tile_categ').val();
    var tile_size  = $('#tile_size').val();

    var width  = parseFloat($('#width').val()) || 0;
    var height  = parseFloat($('#height').val()) || 0;

      var sq_ft = $('#sq_ft').val();


if((tile_categ == 'Bathroom Tile')||(tile_categ == 'Kitchen Tile')){

 if(width == 0 || height == 0){

        return;
    }
}
   

  


    if((tile_categ == 'Bathroom Tile') ||(tile_categ == 'Kitchen Tile')){

    

      var sqft = Math.ceil((width * height));


      $('#sq_ft').val(sqft);

       splitLines(height);

        calculateBoxes();
    }


    else if(tile_categ  == 'Floor Tile') {

    if(tile_size == '1x1'){

            var box_sqft = 8;

            var totalbox = sq_ft / box_sqft;

            $('#total_box').val(totalbox);

            calculateAmount();

    }

    else if(tile_size == '2x2'){

    var box_sqft = 16;

            var totalbox = sq_ft / box_sqft;


            $('#total_box').val(totalbox);

            calculateAmount();

    }

     else if(tile_size == '4x2'){

            var box_sqft = 16;

            var totalbox = sq_ft / box_sqft;

            $('#total_box').val(totalbox);

            calculateAmount();

    }
     else if(tile_size == '16x16'){

            var box_sqft = 8.9;

            var totalbox = sq_ft / box_sqft;

            $('#total_box').val(totalbox);

            calculateAmount();

    }



    }

     else if(tile_categ  == 'Wall Tile') {



    if(tile_size == '2x2'){

            var box_sqft = 16;

            var totalbox = sq_ft / box_sqft;

           

            $('#total_box').val(totalbox);
            calculateAmount();

    }

     else if(tile_size == '4x2'){

            var box_sqft = 16;

            var totalbox = sq_ft / box_sqft;

            $('#total_box').val(totalbox);

            calculateAmount();

    }
     else if(tile_size == '18x12'){

            var box_sqft = 9;

            var totalbox = sq_ft / box_sqft;

            $('#total_box').val(totalbox);
            calculateAmount();

    }


    }



    }






// function splitLines(height){

//   var tile_categ = $('#tile_categ').val();
//     var tile_size  = $('#tile_size').val();

//     var width  = parseFloat($('#width').val()) || 0;
//     // var height  = parseFloat($('#height').val()) || 0;

  
//      let dark = 0;

//     let light = 0;

//     let highlighter = 0;


//     if(tile_categ == 'Bathroom Tile'){

//         $('#highlighter_line').prop('readonly', false);

//     let dark = 0;

//     let light = 0;

//     let highlighter = 0;

    
//     if(height % 3 == 0){

//         dark = height / 3;

//         light = height / 3;

//         highlighter = height / 3;
//     }
//     else if(height % 3 == 1){

//         dark = Math.floor(height / 3) + 1;

//         light = Math.floor(height / 3);

//         highlighter = Math.floor(height / 3);
//     }
//     else{

//         dark = Math.floor(height / 3) + 1;

//         light = Math.floor(height / 3) + 1;

//         highlighter = Math.floor(height / 3);
//     }

//     $('#dark_line').val(dark);

//     $('#light_line').val(light);

//     $('#highlighter_line').val(highlighter);

//     }

//     else if(tile_categ == 'Kitchen Tile'){

//     let dark = 2;

//     let light = height - dark;

//     let highlighter = 0;

    
   

//     $('#dark_line').val(dark);

//     $('#light_line').val(light);

//     $('#highlighter_line').val(highlighter);

//      $('#highlighter_line').prop('readonly', true);


//     }
//     else{

//     // REMOVE READONLY FOR OTHER CATEGORY

//     $('#highlighter_line').prop('readonly', false);
// }
   

// }


function splitLines(height){

    const tile_categ = $('#tile_categ').val();

    height = parseInt(height) || 0;

    let dark = 0;
    let light = 0;
    let highlighter = 0;

    if(tile_categ == 'Bathroom Tile'){

        $('#highlighter_line').prop('readonly',false);
        const base = Math.floor(height / 3);
        let  remainder = height % 3;

        dark  = base;
        light = base;
        highlighter = base;

        if(remainder > 0){
            dark++;
            remainder--;
        }
        if(remainder > 0){
             light++;
            remainder--;
        }
    }

    else if(tile_categ == 'Kitchen Tile'){
        $('#highlighter_line').prop('readonly', true);

        dark = 2;

        light = height-dark;

        highlighter = '-';

    }
    else{
         $('#highlighter_line').prop('readonly', false);
    }
      $('#dark_line').val(dark);
    $('#light_line').val(light);
    $('#highlighter_line').val(highlighter);
}

    function updateLines(type) {

    let height = parseInt($('#height').val());

    let dark = parseInt($('#dark_line').val());

    let light = parseInt($('#light_line').val());

    let highlighter = parseInt($('#highlighter_line').val());

 let totalLine =  dark + light + highlighter;

    if(totalLine > height){
        Swal.fire({
            icon:'error',
            title:'Invalid Line Count',
             text:'Total line count cannot exceed height'
        });
         resetValues();
        return;

    }

    let remaining = height - totalLine;
            if(remaining > 0){

            if(type == 'dark'){

                light += remaining;

            }
            else if(type == 'light'){
                  highlighter += remaining;
            }
            else{
                 dark += remaining;
            }
            }
    

    // if(type == 'dark') {

    //     let remaining = height - dark;

    //     light = Math.ceil(remaining / 2);

    //     highlighter = remaining - light;

    // }

    // else if(type == 'light') {

    //     highlighter = height - dark - light;
    // }

    // else if(type == 'highlighter') {

    //     light = height - dark - highlighter;
    // }


    // if(light < 0) light = 0;

    // if(highlighter < 0) highlighter = 0;

      $('#dark_line').val(dark);
    $('#light_line').val(light);

    $('#highlighter_line').val(highlighter);

    calculateBoxes();
}


function calculateBoxes(){

var width = parseFloat($('#width').val());
var height = $('#height').val();

var sq_ft = $('#sq_ft').val();

    var darkline = parseInt($('#dark_line').val());
    var lightline = parseInt($('#light_line').val());
    var highlight_line =  parseInt($('#highlighter_line').val());


    var tile_size = $('#tile_size').val();
    var tile_categ = $('#tile_categ').val();

    if(width <= 0){

        resetValues();
        return;
    }

      let linepic = 0;

    let picsPerBox = 0;

    if((tile_categ == 'Bathroom Tile')){

    if(tile_size == '18x12'){

        linepic = Math.round((width * 12) / 18);

         picsPerBox = 6;

    }
    else if(tile_size == '2x1'){

       linepic  =  Math.round(width * 12) /24;
       picsPerBox = 5;
    }

    let darkBox =
        ((darkline * linepic) / picsPerBox);

    let lightBox =
        ((lightline * linepic) / picsPerBox);

    let highBox =
        ((highlight_line * linepic) / picsPerBox);


    $('#dark_box').val(darkBox.toFixed(2));

    $('#light_box').val(lightBox.toFixed(2));

      $('#highlighter_box').val(highBox.toFixed(2));
      
    let totalBox = (darkBox + lightBox + highBox).toFixed(2);

    $('#total_box').val(totalBox);

    if(totalBox){
calculateAmount();
    
  
    }

    }

    else if(tile_categ == 'Kitchen Tile'){


    if(tile_size == '18x12'){

        linepic = (Math.round((width * 12) / 18).toFixed(2));

        // alert(linepic);

         picsPerBox = 6;
    }
    else if(tile_size == '2x1'){
        linepic =Math.round((width * 12) / 24);
        picsPerBox = 5;

    }

    let darkBox = ((linepic * darkline) / picsPerBox);
     let lightBox = ((linepic * lightline) / picsPerBox);

     let highlightBox;
      if (sq_ft <= 150) {
      highlightBox = 1;
    } else if (sq_ft <= 300) {
      highlightBox = 2;
    } else {
      highlightBox = Math.ceil(sqft / 150);
    }
     let final_light = parseFloat(lightBox - highlightBox);


      $('#dark_box').val(darkBox.toFixed(2));

    $('#light_box').val(final_light.toFixed(2));

      $('#highlighter_box').val(highlightBox.toFixed(2));
      
    let totalBox = (darkBox + final_light + highlightBox).toFixed(2);

    $('#total_box').val(totalBox);

    if(totalBox){
calculateAmount();
    
  
    }


    }
}

function calculateAmount(){
var tile_size = $('#tile_size').val();
    var tile_categ = $('#tile_categ').val();

        var total_box = parseFloat($('#total_box').val());

        var rate =parseFloat( $('#rate').val());

          var sq_ft =parseFloat( $('#sq_ft').val());

         let box_sqft = 0;

    if(tile_categ == 'Bathroom Tile'){

            if(tile_size == '18x12'){

             box_sqft = 9;
            var amount = (rate * box_sqft * total_box);


            $('#amount').val(amount);

            }

            else if(tile_size == '2x1'){

            
             box_sqft = 10;
            var amount = (rate * box_sqft * total_box);

              $('#amount').val(amount.toFixed(2));
            }

    }
    else if(tile_categ == 'Kitchen Tile'){

            if(tile_size == '18x12'){

             box_sqft = 9;
            var amount = (rate * box_sqft * total_box);

            $('#amount').val(amount);

            }

            else if(tile_size == '2x1'){

            
             box_sqft = 10;
            var amount = (rate * box_sqft * total_box);

              $('#amount').val(amount.toFixed(2));
            }

    }

    else if((tile_categ == 'Wall Tile') || (tile_categ == 'Floor Tile')){

                  
     if(tile_size == '18x12'){

             box_sqft = 9;
            var amount = (rate * box_sqft * total_box);

            $('#amount').val(amount);

            }

            else if(tile_size == '2x1'){

            
             box_sqft = 10;
            var amount = (rate * box_sqft * total_box);

              $('#amount').val(amount.toFixed(2));
            }

             else if(tile_size == '4x2'){

            
             box_sqft = 16;
            var amount = (rate * box_sqft * total_box);

              $('#amount').val(amount.toFixed(2));
            }

              else if(tile_size == '2x2'){

            
             box_sqft = 16;
            var amount = (rate * box_sqft * total_box);

              $('#amount').val(amount.toFixed(2));
            }

    }


}

function calculate_totalbox(){

var darkBox = parseFloat($('#dark_box').val());

var lightBox = parseFloat($('#light_box').val());

var highBox = parseFloat($('#highlighter_box').val()) || 0;


let totalBox = parseFloat((darkBox + lightBox + highBox));

    $('#total_box').val(totalBox.toFixed(2));

if(totalBox){
   calculateAmount(); 
}


}

function resetValues(){


 $('#dark_line').val('');

    $('#light_line').val('');

    $('#highlighter_line').val('');
    $('#dark_box').val(0);

    $('#light_box').val(0);

    $('#highlighter_box').val(0);

    $('#total_box').val(0);

    $('#amount').val(0);
}

function allresetvalue(){

  $('#dark_box').val('');

    $('#light_box').val('');

    $('#highlighter_box').val('');

    $('#total_box').val('');

    $('#dark_line').val('');

    $('#light_line').val('');

    $('#highlighter_line').val('');

    $('#width').val('');

     $('#height').val('');
    $('#amount').val(0);
    $('#sq_ft').val('');
    $('#rate').val('');
}




function add_tile(){

    

    let tile_categ = $('#tile_categ').val();
    let tile_size = $('#tile_size').val();

    let quotation_no = $('#quotation_no').text();
    let screen_id = $('#screen_id').val();

    let design_name = $('#design_name').val();

    let sq_ft = $('#sq_ft').val();
    let rate = $('#rate').val();

    let width = $('#width').val();
    let height = $('#height').val();

    let amount = $('#amount').val();
    let total_box = $('#total_box').val();

    let dark_box = $('#dark_box').val();
    let light_box = $('#light_box').val();
    let highlighter_box = $('#highlighter_box').val();

    let dark_line = $('#dark_line').val();
    let light_line = $('#light_line').val();
    let highlighter_line = $('#highlighter_line').val();
     let sub_uniqueid = $('#sub_uniqueid').val();

    let data = {};

    // Bathroom / Kitchen
    if(tile_categ == 'Bathroom Tile' || tile_categ == 'Kitchen Tile'){

        data = {

            tile_categ : tile_categ,
            tile_size : tile_size,
            design_name : design_name,

            sq_ft : sq_ft,
            rate : rate,

            width : width,
            height : height,

            amount : amount,

            quotation_no : quotation_no,
            screen_id : screen_id,

            dark_box : dark_box,
            light_box : light_box,
            highlighter_box : highlighter_box,

            dark_line : dark_line,
            light_line : light_line,
            highlighter_line : highlighter_line,

            total_box : total_box,

            _token : "{{ csrf_token() }}"
        };
    }

    // Wall / Floor
    else{

        data = {

            tile_categ : tile_categ,
            tile_size : tile_size,
            design_name : design_name,

            quotation_no : quotation_no,
            screen_id : screen_id,

            sq_ft : sq_ft,
            rate : rate,

            amount : amount,
            total_box : total_box,

            _token : "{{ csrf_token() }}"
        };
    }

    var url = "{{route('tilesublist.add') }}";

    if(sub_uniqueid){
         url = "{{ url('tilesublist_update') }}/" + sub_uniqueid;
    }

    $.ajax({

        type : 'POST',

        url : url,

        data : data,

      
        beforeSend:function(){

    let loadingText = 'Saving...';

    if(sub_uniqueid){

        loadingText = 'Updating...';
    }

    Swal.fire({

        html: `

            <div class="text-center">

                <div class="dot-loader">

                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>

                </div>

                <h4 style="margin-top:15px;font-weight:700;color:#111827;">
                    ${loadingText}
                </h4>

                <p style="color:#6b7280;">
                    Please wait...
                </p>

            </div>

        `,

        showConfirmButton:false,

        allowOutsideClick:false,

        background:'#fff',

        width:'320px'

    });

},

        success : function(response){

            Swal.close();


    var data  = response.data;

    var unique_id = data.quotation_id;

            if(response.status == true){

            
                loaddata(unique_id);

            $('#sublist_uniqueid').val('');
               
                Swal.fire({
                    icon : 'success',
                    title : 'Success',
                    text : 'Tile Added Successfully'
                });

                allresetvalue();
            }

        },

        error : function(xhr){

            Swal.close();

            console.log(xhr.responseText);

            Swal.fire({
                icon:'error',
                title:'Error',
                text:'Something went wrong'
            });
        }

    });

}

function loaddata(unique_id= ""){

    $('#sublist_data').html('');

      $('#sublist_uniqueid').val('');

    $.ajax({

        type:'GET',

        url:"{{ route('getsublist_data') }}",

        data:{
            unique_id:unique_id,
            _token:"{{ csrf_token() }}"
        },

        beforeSend:function(){

            console.log('Loading..');
        },

        success:function(response){

            console.log(response);

            if(response.status == true){

                let allData = response.datas;

                let serialNo = 1;
                 let total_amount = 0;

                allData.forEach(function(item){

                    let data = item.data;

                     total_amount += parseFloat(data.amount); 

                     if(total_amount){

                                    $('#sub_totalamount').text(total_amount);
                     }

                    let linedata = item.lineData || [];

                    let badgeclass = '';

                    if(data.tile_categ == 'Floor Tile'){

                        badgeclass = 'floor';

                    }
                    else if(data.tile_categ == 'Wall Tile'){

                        badgeclass = 'wall';

                    }
                    else{

                        badgeclass = 'bath';
                    }

                    let lineDetails = '';

                    if(linedata.length > 0){

                        linedata.forEach(function(line){

                            lineDetails += `

                            <div class="line-mini-details">

                                <span class="dark-mini">
                                    Dark :
                                    ${line.dark_box ?? 0} Box
                                </span>

                                <span class="light-mini">
                                    Light :
                                    ${line.light_box ?? 0} Box
                                </span>

                                <span class="high-mini">
                                    Highlighter :
                                    ${line.highlight_box ?? 0} Box
                                </span>

                            </div>

                            `;

                        });

                    }

                    let row = `

                    <tr id="row_${data.unique_id}">

                        <td>
                            ${serialNo++}
                        </td>

                        <td>

                            <div class="d-flex flex-column">

                                <span class="tile-badge ${badgeclass}">
                                    ${data.tile_categ}
                                </span>

                                <small class="mt-2 text-muted fw-bold">
                                    ${data.tile_size}
                                </small>

                            </div>

                        </td>

                        <td>

                            <div class="design-info">

                                <div class="design-icon">

                                    <i class="fa-solid fa-border-all"></i>

                                </div>

                                <div>

                                    <h6>
                                        ${data.design_name}
                                    </h6>

                                    ${lineDetails}

                                </div>

                            </div>

                        </td>

                        <td>

                            <span class="size-chip">
                                ${data.sq_ft} Sq.ft
                            </span>

                        </td>

                        <td>
                            ${data.total_box}
                        </td>

                        <td>
                            ${data.rate}
                        </td>

                        <td>

                            <div class="amount-box">
                                ₹ ${data.amount}
                            </div>

                        </td>

                        <td class="text-center">

                            <button
                                class="action-btn edit-btn"
                                onclick="editTile('${data.unique_id}')"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <button
                                class="action-btn delete-btn"
                                onclick="deleteTile('${data.unique_id}')"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </td>

                    </tr>

                    `;

                    $('#sublist_data').append(row);

                });

            }

        },

        error:function(xhr){

            console.log(xhr.responseText);
        }

    });

}




function main_submit(){

    $('.error-text').remove();
    $('.form-control').removeClass('is-invalid');

    let isValid = true;
    let firstInvalidField = null;

    var customer_name = $('#customer').val();

        var mobile_no = $('#mobile_no').val();
            var email = $('#email').val();
    var address = $('#address').val();
    var screen_id = $('#screen_id').val();
     var total_amount = $('#sub_totalamount').text();

     var quotation_no = $('#quotation_no').text();

       var sub_tbody = $('#sublist_data tr');
    

     

    if (!customer_name) {

        $('#customer')
            .addClass('is-invalid')
            .after('<small class="error-text text-danger">Customer Name Required</small>');

        if (!firstInvalidField) {
            firstInvalidField = $('#customer');
        }

        isValid = false;
    }

    // Mobile Number
    if (!mobile_no) {

        $('#mobile_no')
            .addClass('is-invalid')
            .after('<small class="error-text text-danger">Mobile Number Required</small>');

        if (!firstInvalidField) {
            firstInvalidField = $('#mobile_no');
        }

        isValid = false;
    }

    // Address
    if (!address) {

        $('#address')
            .addClass('is-invalid')
            .after('<small class="error-text text-danger">Address Required</small>');

        if (!firstInvalidField) {
            firstInvalidField = $('#address');
        }

        isValid = false;
    }

    // Screen ID
    if (!screen_id) {

        $('#screen_id')
            .addClass('is-invalid')
            .after('<small class="error-text text-danger">Screen ID Required</small>');

        if (!firstInvalidField) {
            firstInvalidField = $('#screen_id');
        }

        isValid = false;
    }

  

    // If validation fails
    if (!isValid) {

        Swal.fire({
            title: 'Fill Out Mandatory Fields',
            text: 'Please Fill All Required Fields',
            icon: 'warning',
        });

        if (firstInvalidField) {
            firstInvalidField.focus();
        }

        return;
    }

      if (sub_tbody.length <= 0) {

        Swal.fire({
            title: 'Fill Out Mandatory Fields',
            text: 'At Least Fill One Tile Category',
            icon: 'warning',
        });

        return;
    }
    $.ajax({

    type:'POST',
    url:"{{ route('quotation.create')}}",
    data:{
      customer_name:customer_name,
      email : email,
     address : address,
      screen_id : screen_id,
       total_amount : total_amount,
     quotation_no : quotation_no,
     mobile_no : mobile_no,
    _token:"{{ csrf_token() }}"
    },
    success:function(response){
         if(response.status == true){
            Swal.fire({
                icon:'success',
                title:'Success',
                text:'Successfully Saved'
            });
            
            var redirectUrl = "{{ url('/quotation')}}";

            window.location.href = redirectUrl;
         }
    },
    error:function(xhr){
        console.log(xhr.responseText);
    }
    });


}

function editTile(unique_id) {

$('#sublist_uniqueid').val(unique_id);

    $.ajax({
        url:"{{ route('tilesublist.edit') }}",
        type:'GET',
        data:{
            unique_id:unique_id,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            Swal.fire({
                title:"Loading",
                text:"Please Wait",
                allowOutsideClick:false,
                didOpen:() => {
                Swal.showLoading();
                }
            });
        },
        success:function(response){
             Swal.close();
            var status  = response.status;
            if(status == true){

            var data = response.data;
             var lineData = response.lineData;

            if(data){

                $('#tile_categ').val(data.tile_categ);

                  get_tilesize();

                setTimeout(function(){

                    $('#tile_size').val(data.tile_size);

                },300);
            
                 $('#rate').val(data.rate); 
                 $('#sq_ft').val(data.sq_ft);

                 $('#total_box').val(data.total_box); 

                  $('#design_name').val(data.design_name);

                 $('#amount').val(data.amount);

                  $('#width').val(data.width);

                $('#height').val(data.height);
                
                 
            }
            if(lineData){

             $('#dark_box').val(lineData.dark_box);
                 $('#light_box').val(lineData.light_box); 
                 $('#highlighter_box').val(lineData.highlight_box); 
                 $('#dark_line').val(lineData.dark_line);

                 $('#light_line').val(lineData.light_line); 
                 $('#highlighter_line').val(lineData.highlight_line);

            }

            //   $('#sub_uniqueid').attr('data-edit-id',unique_id);
            $('#sub_uniqueid').val(data.unique_id);

                // REMOVE OLD ROW

                // $('#row_'+unique_id).remove();


            }
           


            

        }
    });
}


function deleteTile(unique_id){

    Swal.fire({

        title: 'Are you sure?',

        text: "You want to delete this item!",

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#dc2626',

        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Yes, Delete It',

        cancelButtonText: 'Cancel',

        reverseButtons: true

    }).then((result) => {

        if(result.isConfirmed){

            $.ajax({

                url:"{{ route('sublist_delete')}}",

                type:'POST',

                data:{
                    unique_id:unique_id,
                    _token:"{{ csrf_token() }}"
                },

                beforeSend:function(){

                    let loadingText = 'Deleting...';

                    Swal.fire({

                        html: `

                            <div class="text-center">

                                <div class="dot-loader">

                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>

                                </div>

                                <h4 style="margin-top:15px;font-weight:700;color:#111827;">
                                    ${loadingText}
                                </h4>

                                <p style="color:#6b7280;">
                                    Please wait...
                                </p>

                            </div>

                        `,

                        showConfirmButton:false,

                        allowOutsideClick:false,

                        background:'#fff',

                        width:'320px'

                    });

                },

                success:function(response){

                    Swal.close();

                    if(response.status == true){

                        $('#row_'+unique_id).remove();



                        var quotation_id = response.quotation_id;

                        alert(quotation_id)

                        loaddata(quotation_id);
                        Swal.fire({

                            icon:'success',

                            title:'Deleted',

                            text:'Deleted Successfully',

                            timer:2000,

                            showConfirmButton:false

                        });

                    }
                    else{

                        Swal.fire({

                            icon:'error',

                            title:'Error',

                            text:response.message

                        });

                    }

                },

                error:function(xhr){

                    Swal.close();

                    Swal.fire({

                        icon:'error',

                        title:'Error',

                        text:'Something Went Wrong'

                    });

                    console.log(xhr.responseText);

                }

            });

        }

    });

}




function get_id(){

$.ajax({
    type : 'POST',
    url : "{{ route('getIds') }}",
    data:{
        '_token': "{{csrf_token() }}"
    },
    success:function(response){

        var quotation_no = response.quotation_no;

         var screen_id = response.screen_id;

         if(quotation_no){

            $('#quotation_no').text(quotation_no);
             $('#screen_id').val(screen_id);
         }

    }
});
}


$(document).ready(function(){

get_id();
});




    </script>

@endsection