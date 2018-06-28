@extends('layouts.dashboard')

@section('dashboard-content') 

<div class="ui-layout ui-layout--full-width">
   <div class="ui-layout__sections">
      <div class="ui-layout__section">
         <div class="ui-layout__item">
            <section class="ui-card">
               <div class="has-bulk-actions">
				 <div class="next-tab__container payment_report_title_container">
					<span class="payment_report_title">All Paid Orders</span>
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
                                          Report no. 
										</span>
                                       </th>
                                       <th class="is-sortable">
										<span>
                                         Payment date
										</span>
                                       </th>
                                       <th class="is-sortable">
										<span>
									     Order Amount
										</span>
                                       </th>
									   <th class="is-sortable">
										<span>
                                           Paid Amount
										</span>
                                       </th>
									   <th class="is-sortable">
										<span>
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