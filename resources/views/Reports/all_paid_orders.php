@extends('layouts.dashboard')

@section('dashboard-content')

<div class="ui-layout ui-layout--full-width">
   <div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
		 
		    <div class="prepare_for_payment_page_header">
				<h1>Prepare For Payment</h1>
			</div>
            <section class="ui-card">
               <div class="has-bulk-actions">
                  <div>
                     <div class="next-tab__container payment_report_title_container">
						<span class="payment_report_title">Payment Report</span>
                     </div>
                  </div>
                  <div>
                     <div class="ui-card__section">
                        <div class="ui-type-container">
                           <div class="table-wrapper">
                              <table class="table-hover expanded students_reports_table">
                                 <thead>
                                    <tr>
                                       <th>
                                       </th>
                                       <th class="is-sortable">
										<span>
                                           Manager Name 
										</span>
                                       </th>
                                       <th class="is-sortable">
										<span>
                                         Campus Name
										</span>
                                       </th>
                                       <th class="is-sortable">
										<span>
									     Total Orders
										</span>
                                       </th>
									   <th class="is-sortable">
										<span>
                                           Total Sales
										</span>
                                       </th>
									   <th class="is-sortable">
										<span>
                                          Total Payment 
										</span>
                                       </th>
									   <th class="is-sortable">
										<span>
                                           Payment
										</span>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody context="bulkOperations">
									
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>

@endsection

@section('Script-content')
	<script>
	
	</script>
@endsection