<!DOCTYPE html>

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
             
                <!-- Default Wizard -->
                
                <div class="row">
                <div class="col">
                  <h6 class="mt-4">Budget Entry</h6>
                  <div class="card mb-3">
                    <div class="card-header pt-2">
                      <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                          <button
                            class="nav-link active"
                            data-bs-toggle="tab"
                            data-bs-target="#form-tabs-personal"
                            role="tab"
                            aria-selected="true">
                            Yarn
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#form-tabs-account"
                            role="tab"
                            aria-selected="false">
                            Knitting
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#form-tabs-social"
                            role="tab"
                            aria-selected="false">
                            Dyeing
                          </button>
                        </li>
                        <li class="nav-item">
                          <button
                            class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#form-tabs-com"
                            role="tab"
                            aria-selected="false">
                            Commercial
                          </button>
                        </li>
                      </ul>
                    </div>

                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-first-name">I.O No/Order No:</label>
                              <input type="text" id="formtabs-first-name" class="form-control" placeholder="350-FCUECJ3J3J3J" />
                            </div>
                            
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Status</label>
                              <select id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Running</option>
                                <option value="Bangladesh">Completed</option>
                                <option value="Belarus">All</option>
                                
                              </select>
                            </div><div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">Order Qty</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="500 Kg" />
                            </div>
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">P.O. Rate</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="282.45" />
                            </div>
                            
                            
                          </div>
<BR>
                          <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th >Dept&nbsp;/&nbsp;Process</th>
                                <th>Yarn&nbsp;Count</th>
                                <th>Yarn&nbsp;Colour</th>
                                <th>Type</th>
                                <th>Reqd&nbsp;Kgs</th> 
                                <th>Rate / Kgs</th>
                                <th>Fin.Gsm</th>
                                <th>Add. Rate</th>
                                <th>Reproc&nbsp;Rate</th>
                                <th>Remarks</th> 
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td  style="padding: 0.3rem;">
               <input
                                  type="text"
                    
                                  class="form-control"
                                  id="ecomme"
                                  placeholder="123"
                                  name="12"
                                  aria-label="Product barcode"/>
              </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              
                                
                              </tr>
                              
                              
                              
                              
                              
                              
                              
                              
                            </tbody>
                          </table>
                        
                        
                        </div>

                          <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane fade" id="form-tabs-account" role="tabpanel">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-first-name">I.O No/Order No:</label>
                              <input type="text" id="formtabs-first-name" class="form-control" placeholder="350-FCUECJ3J3J3J" />
                            </div>
                            
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Status</label>
                              <select id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Running</option>
                                <option value="Bangladesh">Completed</option>
                                <option value="Belarus">All</option>
                                
                              </select>
                            </div><div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">Order Qty</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="500 Kg" />
                            </div>
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">P.O. Rate</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="282.45" />
                            </div>
                            
                            
                          </div>
<BR>
                          <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th >Dept&nbsp;/&nbsp;Process</th>
                                <th>Fabric</th>
                                <th>Colour</th>
                                <th>Fab.Count</th>
                                <th>Gsm</th> 
                                <th>Fin.Gsm</th>
                                <th>GG</th>
                                <th>LL</th>
                                <th>Dia</th>
                                <th>Fin.Dia</th> 
                                <th>Prog.Kgs</th> 
                                <th>Prog.Pcs/Mtr</th> 
                                <th>Uom</th> 
                                <th>Rate.UOM</th>
                                <th>Po.Rate</th>
                                <th>Add.Rate</th>
                                <th>Repro.Rate</th>
                                <th>Remark</th>

                                
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td  style="padding: 0.3rem;">
               <input
                                  type="text"
                    
                                  class="form-control"
                                  id="ecomme"
                                  placeholder="123"
                                  name="12"
                                  aria-label="Product barcode"/>
              </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              </tr>
                              
                              
                              
                              
                              
                              
                              
                              
                            </tbody>
                          </table> </div>

                          <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                          </div>
                        </form>
                       
                      </div>
                      <div class="tab-pane fade" id="form-tabs-social" role="tabpanel">
                        <form>
                          <div class="row g-3">
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-first-name">I.O No/Order No:</label>
                              <input type="text" id="formtabs-first-name" class="form-control" placeholder="350-FCUECJ3J3J3J" />
                            </div>
                            
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Status</label>
                              <select id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Australia">Running</option>
                                <option value="Bangladesh">Completed</option>
                                <option value="Belarus">All</option>
                                
                              </select>
                            </div><div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">Order Qty</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="500 Kg" />
                            </div>
                            <div class="col-md-3">
                              <label class="form-label" for="formtabs-last-name">P.O. Rate</label>
                              <input type="text" id="formtabs-last-name" class="form-control" placeholder="282.45" />
                            </div>
                            
                            
                          </div>
<BR>
                          <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th >Dept&nbsp;/&nbsp;Process</th>
                                <th>Colour</th>
                                <th>Fabric</th>
                                <th>Design</th>
                                <th>Fab.Count</th> 
                                <th>Gsm</th>
                                <th>Fin.Gsm</th>
                                <th>GG</th>
                                <th>LL</th>
                                <th>Dia</th> 
                                <th>Fin.Dia</th>
                                <th>Prog.Kgs</th> 
                                <th>Prog.pcs/Mtr</th>
                                <th>Uom</th> 
                                <th>Rate</th>
                                <th>Rate.UOM</th> 
                                <th>Add.Rate</th> 
                                <th>Reproc.Rate</th> 
                                <th>Remarks</th> 
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td  style="padding: 0.3rem;">
               <input
                                  type="text"
                    
                                  class="form-control"
                                  id="ecomme"
                                  placeholder="123"
                                  name="12"
                                  aria-label="Product barcode"/>
              </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="C9-REMAKE"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   class="form-control"
                                   id="ecommerce-product-barcode"
                                   placeholder="Cfh"
                                   name="productBarcode"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ecommerce-product-barcode"
                                  placeholder="Cfh"
                                  name="productBarcode"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              

              
                                
                              </tr>
                              
                              
                              
                              
                              
                              
                              
                              
                            </tbody>
                          </table>
                        
                        
                        </div>

                          <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



                
                
                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3">Structure - Style No : <span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px" >&nbsp;015H444FFFS&nbsp;</span>&nbsp;&nbsp;Weight :&nbsp;<span style="background-color: orange; color: white;border-radius: 2px;padding: 2px" >&nbsp;1500 Kgs&nbsp;</span></h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive">
                      <table class="table table-border border-top">
                        <thead class="border-bottom">
                          <tr>
                            
                            <th style="width:20%;">Process</th>
                            <th style="width:60%;">Sub&nbsp;Process</th>
                            <th style="width:10%;">Excess&nbsp;%</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark0" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark1" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark2" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark3" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                   <option value="Box">Yarn</option>
                                   <option value="Kgs">Kintting</option>
                                   <option value="Mtrs">Merch</option>
                                   <option value="Nos">Dyeing</option>
                                   <option value="Pcs">Aop</option>
                                   <option value="Pcs">Openknitting</option>
                                   <option value="Pcs">Washing</option>
                               </select>
                                                    

                             </td>
                             
                             <td>
                              <div class="select2-dark">
                                <select id="select2Dark4" class="select2 form-select" multiple>
                                  <option value="1" selected>Merch</option>
                                  <option value="2" selected>Bio wash</option>
                                  <option value="3">Silicon</option>
                                  <option value="4">senter</option>
                                  <option value="4">Open Width Compacting</option>
                                </select>
                              </td>
          
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ecommerce-product-barcode"
                                                 placeholder="5"
                                                 name="productBarcode"
                                                 aria-label="Product barcode"/>
                                                    
                             </td>            
          
                          </tr>

                          
                          
                          
                          
                          
                        </tbody>
                      </table>
                    
                    
                    
                    </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                
                
                
                
                <div class="modal fade" id="largeModal1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3">Fabric Details - Style No : <span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px" >&nbsp;015H444FFFS&nbsp;</span></h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive">
                      <table class="table table-border border-top">
                        <thead class="border-bottom">
                          <tr>
                            
                            <th style="width:20%;">Fabric</th>
                            <th style="width:20%;">Print</th>
                            <th style="width:15%;">Weight(KGS)</th>
                            <th style="width:50%;">Color</th>
                            <th style="width:15%;">Size&nbsp;Group</th> 
                            
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box">Grey yarn</option>
                                   <option value="Box">Pique</option>
                                   <option value="Box">Coller</option>
                                   <option value="Kgs">Cuff</option>
                                   
                               </select>
                                                    
                             </td>
                             <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box"> AoP</option>
                                   <option value="Box">No</option>
                                  
                                   
                               </select>
                                                    
                             </td> <td style="padding: 0.3rem">
            <input
                               type="text"
                               class="form-control"
                               id="ecommerce-product-barcode"
                               placeholder="black"
                               name="productBarcode"
                               aria-label="Product barcode"/>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                 <option value="Box">Black,Blue,Green</option>
                 <option value="Kgs">Black,Blue,Orange,Green</option>
                 
             </select>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                <option value="Box">Fabric</option>

                 <option value="Box">X,XL,XXL</option>
                 <option value="Kgs">35,45,55</option>
                 
             </select>
                                  
           </td>
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box">Grey yarn</option>
                                   <option value="Box">Pique</option>
                                   <option value="Box">Coller</option>
                                   <option value="Kgs">Cuff</option>
                                   
                               </select>
                                                    
                             </td>
                             <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box"> AoP</option>
                                   <option value="Box">No</option>
                                  
                                   
                               </select>
                                                    
                             </td> <td style="padding: 0.3rem">
            <input
                               type="text"
                               class="form-control"
                               id="ecommerce-product-barcode"
                               placeholder="black"
                               name="productBarcode"
                               aria-label="Product barcode"/>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                 <option value="Box">Black,Blue,Green</option>
                 <option value="Kgs">Black,Blue,Orange,Green</option>
                 
             </select>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                <option value="Box">Fabric</option>

                 <option value="Box">X,XL,XXL</option>
                 <option value="Kgs">35,45,55</option>
                 
             </select>
                                  
           </td>
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box">Grey yarn</option>
                                   <option value="Box">Pique</option>
                                   <option value="Box">Coller</option>
                                   <option value="Kgs">Cuff</option>
                                   
                               </select>
                                                    
                             </td>
                         <td style="padding: 0.3rem">
                          <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                              <option value="">Select</option>
                              <option value="Box"> AoP</option>
                               <option value="Box">No</option>
                              
                               
                           </select>
                                                
                         </td> <td style="padding: 0.3rem">
            <input
                               type="text"
                               class="form-control"
                               id="ecommerce-product-barcode"
                               placeholder="black"
                               name="productBarcode"
                               aria-label="Product barcode"/>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                 <option value="Box">Black,Blue,Green</option>
                 <option value="Kgs">Black,Blue,Orange,Green</option>
                 
             </select>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                <option value="Box">Fabric</option>

                 <option value="Box">X,XL,XXL</option>
                 <option value="Kgs">35,45,55</option>
                 
             </select>
                                  
           </td>
                          </tr>
                          <tr>
                            
                            <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box">Grey yarn</option>
                                   <option value="Box">Pique</option>
                                   <option value="Box">Coller</option>
                                   <option value="Kgs">Cuff</option>
                                   
                               </select>
                                                    
                             </td>
                             <td style="padding: 0.3rem">
                              <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                                  <option value="">Select</option>
                                  <option value="Box"> AoP</option>
                                   <option value="Box">No</option>
                                  
                                   
                               </select>
                                                    
                             </td> <td style="padding: 0.3rem">
            <input
                               type="text"
                               class="form-control"
                               id="ecommerce-product-barcode"
                               placeholder="black"
                               name="productBarcode"
                               aria-label="Product barcode"/>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                 <option value="Box">Black,Blue,Green</option>
                 <option value="Kgs">Black,Blue,Orange,Green</option>
                 
             </select>
                                  
           </td><td style="padding: 0.3rem">
            <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-primary" type="text" name="unit[]" id="unit"  >
                <option value="">Select</option>
                <option value="Box">Fabric</option>

                 <option value="Box">X,XL,XXL</option>
                 <option value="Kgs">35,45,55</option>
                 
             </select>
                                  
           </td>
                          </tr>
                          
                          
                          
                          
                          
                          
                        </tbody>
                      </table>
                    
                    
                    
                    </div>
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
    <script src="../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
<script src="../assets/vendor/libs/dropzone/dropzone.js"></script>

    <!-- Main JS -->

    <!-- Page JS -->
    <script src="../assets/js/forms-file-upload.js"></script>
    <!-- Page JS -->

    <script src="../assets/js/form-wizard-numbered.js"></script>
    <script src="../assets/js/form-wizard-validation.js"></script>
  </body>
</html>
