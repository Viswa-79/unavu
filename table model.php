<!DOCTYPE html>
<?php include "config.php"; ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
             <div class="card">
                <div class="card-datatable table-responsive">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row ms-2 me-3"><div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"><div class="dt-buttons btn-group flex-wrap"><button class="btn btn-secondary btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="ti ti-plus me-md-1"></i><span class="d-md-inline-block d-none">Create Invoice</span></span></button> </div></div></div><div class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search Invoice" aria-controls="DataTables_Table_0"></label></div><div class="invoice_status mb-3 mb-md-0"><select id="UserRole" class="form-select"><option value=""> Select Status </option><option value="Downloaded" class="text-capitalize">Downloaded</option><option value="Draft" class="text-capitalize">Draft</option><option value="Paid" class="text-capitalize">Paid</option><option value="Partial Payment" class="text-capitalize">Partial Payment</option><option value="Past Due" class="text-capitalize">Past Due</option><option value="Sent" class="text-capitalize">Sent</option></select></div></div></div><table class="invoice-list-table table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1220px;">
                    <thead>
                      <tr><th class="control sorting dtr-hidden" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=": activate to sort column ascending"></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 78px;" aria-label="#ID: activate to sort column ascending" aria-sort="descending">#ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 55px;" aria-label=": activate to sort column ascending"><i class="ti ti-trending-up text-secondary"></i></th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 319px;" aria-label="Client: activate to sort column ascending">Client</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 86px;" aria-label="Total: activate to sort column ascending">Total</th><th class="text-truncate sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 156px;" aria-label="Issued Date: activate to sort column ascending">Issued Date</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117px;" aria-label="Balance">Balance</th><th class="cell-fit sorting_disabled" rowspan="1" colspan="1" style="width: 103px;" aria-label="Actions">Actions</th></tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                    <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                    <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                    <td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Sent<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020</span>" data-bs-original-title="<span>Sent<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 05/09/2020</span>"><span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-sm"></i></span></span></td>
                    <td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-secondary">JK</span></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Jamal Kerrod</span></a><small class="text-truncate text-muted">Software Development</small></div></div></td>
                    <td><span class="d-none">3077</span>$3077</td>
                    <td class="" style=""><span class="d-none">20200509</span>09 May 2020</td>
                    <td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td>
                    <td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td>
                    </tr>
                    
                    <tr class="even">
                    <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                    <td class="sorting_1"><a href="app-invoice-preview.html">#5041</a></td>
                    <td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Sent<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020</span>" data-bs-original-title="<span>Sent<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 11/19/2020</span>"><span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-sm"></i></span></span></td>
                    <td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Shamus Tuttle</span></a><small class="text-truncate text-muted">Software Development</small></div></div></td>
                    <td><span class="d-none">2230</span>$2230</td><td class="" style=""><span class="d-none">20201119</span>19 Nov 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5027</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020</span>" data-bs-original-title="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 09/25/2020</span>"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Devonne Wallbridge</span></a><small class="text-truncate text-muted">Software Development</small></div></div></td><td><span class="d-none">2787</span>$2787</td><td class="" style=""><span class="d-none">20200925</span>25 Sep 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5024</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020</span>" data-bs-original-title="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> -$202<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 08/02/2020</span>"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/10.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Ariella Filippyev</span></a><small class="text-truncate text-muted">Unlimited Extended License</small></div></div></td><td><span class="d-none">5285</span>$5285</td><td class="" style=""><span class="d-none">20200802</span>02 Aug 2020</td><td class="" style=""><span class="d-none">-$202</span>-$202</td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#5020</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Downloaded<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020</span>" data-bs-original-title="<span>Downloaded<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 12/15/2020</span>"><span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/11.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Roy Southerell</span></a><small class="text-truncate text-muted">UI/UX Design &amp; Development</small></div></div></td><td><span class="d-none">5219</span>$5219</td><td class="" style=""><span class="d-none">20201215</span>15 Dec 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4995</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020</span>" data-bs-original-title="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 06/09/2020</span>"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Raynell Clendennen</span></a><small class="text-truncate text-muted">Template Customization</small></div></div></td><td><span class="d-none">3313</span>$3313</td><td class="" style=""><span class="d-none">20200609</span>09 Jun 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4993</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 10/22/2020</span>" data-bs-original-title="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 10/22/2020</span>"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-primary">LA</span></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Lutero Aloshechkin</span></a><small class="text-truncate text-muted">Unlimited Extended License</small></div></div></td><td><span class="d-none">4836</span>$4836</td><td class="" style=""><span class="d-none">20201022</span>22 Oct 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4989</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Past Due<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 08/01/2020</span>" data-bs-original-title="<span>Past Due<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 08/01/2020</span>"><span class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30"><i class="ti ti-info-circle ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-success">OG</span></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Orson Grafton</span></a><small class="text-truncate text-muted">Unlimited Extended License</small></div></div></td><td><span class="d-none">5293</span>$5293</td><td class="" style=""><span class="d-none">20200801</span>01 Aug 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4989</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Downloaded<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 09/23/2020</span>" data-bs-original-title="<span>Downloaded<br> <span class=&quot;fw-medium&quot;>Balance:</span> 0<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 09/23/2020</span>"><span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">LH</span></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Lorine Hischke</span></a><small class="text-truncate text-muted">Unlimited Extended License</small></div></div></td><td><span class="d-none">3623</span>$3623</td><td class="" style=""><span class="d-none">20200923</span>23 Sep 2020</td><td class="" style=""><span class="badge bg-label-success" text-capitalized=""> Paid </span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="sorting_1"><a href="app-invoice-preview.html">#4965</a></td><td><span data-bs-toggle="tooltip" data-bs-html="true" aria-label="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> $666<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 03/18/2021</span>" data-bs-original-title="<span>Partial Payment<br> <span class=&quot;fw-medium&quot;>Balance:</span> $666<br> <span class=&quot;fw-medium&quot;>Due Date:</span> 03/18/2021</span>"><span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span></span></td><td><div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar me-2"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="pages-profile-user.html" class="text-body text-truncate"><span class="fw-medium">Yelena O'Hear</span></a><small class="text-truncate text-muted">Unlimited Extended License</small></div></div></td><td><span class="d-none">3789</span>$3789</td><td class="" style=""><span class="d-none">20210318</span>18 Mar 2021</td><td class="" style=""><span class="d-none">$666</span>$666</td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Send Mail" data-bs-original-title="Send Mail"><i class="ti ti-mail mx-2 ti-sm"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" aria-label="Preview Invoice" data-bs-original-title="Preview Invoice"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div></td></tr></tbody>
                  </table><div class="row mx-2"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" aria-role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" aria-role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
              </div>
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Currency</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                    <form action="" method="post">
                      <label class="form-label" for="add-user-fullname" hidden>ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder="" 
                          name="id"
                          value=""
                          hidden
                          aria-label="John Doe"
                          />
                      </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Currency</label>
                        <input
                          type="text"
                          class="form-control"
                          id="currency"
                          placeholder=" "
                          name="currency"
                          aria-label="John Doe" required/>
                      </div>

                    
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">INR Value</label>
                        <input
                          type="text"
                          class="form-control"
                          id="inrvalue"
                          placeholder="eg: 1500"
                          name="inrvalue"
                          aria-label="John Doe" />
                      </div>
                      
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/app-user-list.js"></script>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];    
$currency=$_POST['currency'];
$inrvalue=$_POST['inrvalue'];

if($id==""){
 $sql="insert into currency (currency,inrvalue) values('$currency','$inrvalue')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql="UPDATE currency SET currency='$currency',inrvalue='$inrvalue'  WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert('Currency added successfully');window.location='currency.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('Currency Updated Successfully');window.location='currency.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?>  

<script>
function getCurr(id) {
  document.getElementById('form-title').innerHTML='Edit';
  var c=(id.substr(4));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#id').val(data.id);  
                    $('#currency').val(data.currency);                 
                    $('#inrvalue').val(data.inrvalue);
}

      }
    };
    xmlhttp.open("GET","ajax/getCurr.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>   

<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#currency').val('');                 
                    $('#inrvalue').val('');
}
</script>

</script>

<script>
function delCurr(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='currency.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delCurr.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>