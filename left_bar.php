<!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas" >
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                           
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?=$user_nm;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li >
                            <a href="index.php">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
													<?
					
if($user_current_level<0)
{
?>
<li class="treeview">
<a href="#">
<i class="fa fa-cogs"  ></i>
<span >Setup</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<?
echo "<li><a href=\"nbrnch.php\" ><i class=\"fa fa-circle\"></i>Branch </a></li>";
//echo "<li><a href=\"section.php\" ><i class=\"fa fa-circle\"></i>Section </a></li>";
echo "<li><a href=\"pcat.php\" ><i class=\"fa fa-circle\"></i>Category </a></li>";
echo "<li><a href=\"pent.php\" ><i class=\"fa fa-circle\"></i>Product </a></li>";
echo "<li><a href=\"sentry.php\" ><i class=\"fa fa-circle\"></i>Supplier </a></li>";
echo "<li><a href=\"sup_gst.php\" ><i class=\"fa fa-circle\"></i>Supplier GST </a></li>";
echo "<li><a href=\"cust_entry.php\" ><i class=\"fa fa-circle\"></i>Customer </a></li>";
echo "<li><a href=\"acgrp_form.php\" ><i class=\"fa fa-circle\"></i>Account Group</a></li>";
echo "<li><a href=\"acldgr_form.php\" ><i class=\"fa fa-circle\"></i>Ledger Head</a></li>";
?>
</ul>
</li>  
<?}
if($user_current_level<0)
{?>
<li class="treeview">
<a href="#"><i class="fa fa-edit"></i><span>View & Edit</span><i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<?
echo "<li><a href=\"prod_list.php\" ><i class=\"fa fa-circle\"></i>Product</a></li>";
echo "<li><a href=\"s_show.php\" ><i class=\"fa fa-circle\"></i>Supplier</a></li>";
echo "<li><a href=\"c_show.php\" ><i class=\"fa fa-circle\"></i>Customer</a></li>";
echo "<li><a href=\"comp_dtls.php\" ><i class=\"fa fa-circle\"></i>Company Details</a></li>";
?>
</ul>
</li> 
<?}?> 

<li class="treeview">
<a href="#"><i class="fa fa-star"></i><span>Invoice</span><i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<?
echo "<li><a href=\"stk_adjust.php\"><i class=\"fa fa-circle\"></i>Stock Adjustment</a></li>";
echo "<li><a href=\"purchase-gst.php\" target=\"_blank\"><i class=\"fa fa-circle\"></i>Purchase</a></li>";
echo "<li><a href=\"billing-gst.php\" target=\"_blank\"><i class=\"fa fa-circle\"></i>Sale Invoice</a></li>";
echo "<li><a href=\"srvs_gst.php\" target=\"_blank\"><i class=\"fa fa-circle\"></i>Service Invoice</a></li>";
echo "<li><a href=\"debit_note.php\" ><i class=\"fa fa-circle\"></i>SUPPLIER CN DN WITH GST</a></li>";

?>
</ul>
</li> 

<li class="treeview">
<a href="#"><i class="fa fa-star"></i><span>Report</span><i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<?
echo "<li><a href=\"purchase_show.php\" target=\"_blank\"><i class=\"fa fa-circle\"></i>Day Wise Purchase</a></li>";
echo "<li><a href=\"purchase_show_ret.php\" target=\"_blank\"><i class=\"fa fa-circle\"></i>Day Wise Purchase Return</a></li>";

echo "<li><a href=\"sale_show.php\" ><i class=\"fa fa-circle\"></i>Day Wise Sale Details</a></li>";
echo "<li><a href=\"sale_show_ret.php\" ><i class=\"fa fa-circle\"></i>Day Wise Sale Return</a></li>";
echo "<li><a href=\"stock_st_day.php\" ><i class=\"fa fa-circle\"></i>Day Wise Stock Details </a></li>";
echo "<li><a href=\"prod_wise_stk.php\" ><i class=\"fa fa-circle\"></i>Product Wise Stock Statement </a></li>";
echo "<li><a href=\"stk_summary.php\" ><i class=\"fa fa-circle\"></i>Stock Summary </a></li>";
echo "<li><a href=\"product_history.php\" ><i class=\"fa fa-circle\"></i>Product History</a></li>";

echo "<li><a href=\"credit_note_gst_list.php\" ><i class=\"fa fa-circle\"></i>SUPPLIER CN DN WITH GST</a></li>";

echo "<li><a href=\"sale_show_ser.php\" ><i class=\"fa fa-circle\"></i>Day Wise Service Details</a></li>";
?>
</ul>
</li> 
<li class="treeview">
<a href="#">
<i class="fa fa-star" ></i>
<span >Accounts</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
	<?


 echo "<li><a href=\"projectop_form.php\" ><i class=\"fa fa-circle\"></i>Opening Balance</a></li>";
	echo "<li><a href=\"income.php\" ><i class=\"fa fa-circle\"></i>Income</a></li>";
	if($user_current_level<0)
	{
    echo "<li><a href=\"expense.php\" ><i class=\"fa fa-circle\"></i>Expenses</a></li>";
	}
	echo "<li><a href=\"jrnl_form.php\"><i class=\"fa fa-circle\"></i>Journal</a></li>";
	echo "<li><a href=\"recv_reg.php\" ><i class=\"fa fa-circle\"></i>Received Register</a></li>";
	
	if($user_current_level<0)
	{
	/*echo "<li><a href=\"refund.php\" ><i class=\"fa fa-circle\"></i>Refund Amount</a></li>";*/
	echo "<li><a href=\"pay_reg.php\" ><i class=\"fa fa-circle\"></i>Payment Register</a></li>";
	}
	echo "<li><a href=\"crdt_note.php\" ><i class=\"fa fa-circle\"></i>Credit Note</a></li>";
	
	/*echo "<li><a href=\"debit_note.php\" ><i class=\"fa fa-circle\"></i>Debit Note</a></li>";*/
	echo "<li><a href=\"contra.php\" ><i class=\"fa fa-circle\"></i>Contra</a></li>";

?>
							</ul>
    </li>  
	 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-star"   ></i>
                                <span >Accounts Report </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
	<?
	echo "<li > <a href=\"acledr.php\" target=\"\"><i class=\"fa fa-circle\"></i>Ledger A/C</a></li>";
  echo "<li><a href=\"inex_form.php\" target=\"\"><i class=\"fa fa-circle\"></i>Income & Expenditure A/c</a></li>";
   echo "<li><a href=\"blst_form.php\" target=\"\"><i class=\"fa fa-circle\"></i>Balance Sheet</a></li>";
	/* echo "<li><a href=\"day_book.php\" target=\"\"><i class=\"fa fa-circle\"></i>Day Book</a></li>";*/
	echo "<li><a href=\"cash_acc.php\" target=\"\"><i class=\"fa fa-circle\"></i>Cash Ac.</a></li>";
	echo "<li><a href=\"bank_acc.php\" target=\"\"><i class=\"fa fa-circle\"></i>Bank Ac.</a></li>";
	echo "<li><a href=\"cust_statment.php\" target=\"\"><i class=\"fa fa-circle\"></i>Customer Statement</a></li>";
		echo "<li><a href=\"cust_statment1.php\" target=\"\"><i class=\"fa fa-circle\"></i>Customer Summary</a></li>";
    echo "<li><a href=\"supp_statment.php\" target=\"\"><i class=\"fa fa-circle\"></i>Supplier Statement</a></li>";

	?>
		
							</ul>
    </li>  


	 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-star"   ></i>
                                <span >GST Report </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
	<?

  echo "<li><a href=\"gst_b2b.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR-1 B2B Report</a></li>";
  echo "<li><a href=\"gst_b2cl.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR-1 B2CL Report</a></li>";
  echo "<li><a href=\"gst_b2cs.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR-1 B2CS Report</a></li>";
  echo "<li><a href=\"gst_report.php\" target=\"\"><i class=\"fa fa-circle\"></i>GST HSN Report</a></li>";
  echo "<li><a href=\"gstr_1.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR-1 Report</a></li>";
  echo "<li><a href=\"gst_3b.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR B3</a></li>";
  echo "<li><a href=\"gstr1_doc.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR-1 Docs</a></li>";
  echo "<li><a href=\"cdnr.php\" target=\"\"><i class=\"fa fa-circle\"></i>GSTR1-cdnr</a></li>";



	?>
		
							</ul>
    </li>   
<?
		if ($user_current_level < 0){
	?>
			
	<li class="treeview">
                            <a href="#">
                                <i class="fa fa-star" id="cnm1"  ></i>
                                <span >System</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
	<?


	echo "<li > <a href=\"user.php\" target=\"\"><i class=\"fa fa-user\"></i>New User</a></li>";
	echo "<li > <a href=\"user_show.php\" target=\"\"><i class=\"fa fa-users\"></i>User List</a></li>";
	/*echo "<li > <a href=\"main_m_entry.php\" target=\"\"><i class=\"fa fa-users\"></i>Main Menu</a></li>";
    echo "<li > <a href=\"menu_entry.php\" target=\"\"><i class=\"fa fa-users\"></i>Menu Setup</a></li>";
    echo "<li > <a href=\"mroll.php\" target=\"\"><i class=\"fa fa-users\"></i>Roll Asign</a></li>";
	echo "<li><a href=\"menu_setup.php\" target=\"\"><i class=\"fa fa-circle\"></i>App Menu</a></li>";
echo "<li><a href=\"menu_assign.php\" target=\"\"><i class=\"fa fa-circle\"></i>App Roll Assign</a></li>";
*/
	?>
		
							</ul>
    </li> 
		  
		<?}?>
	
						
</section>
<!-- /.sidebar -->
</aside>