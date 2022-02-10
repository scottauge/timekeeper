<!-- Menu system via DOJO/DIJIT -->
<!-- This will be made into an include -->
<!-- $Id: incMenu.php 13 2019-07-09 02:18:15Z scottauge $ -->

<link rel="stylesheet" href="dijit/themes/claro/claro.css">
<script>dojoConfig = {async: true}</script>
<script src='dojo/dojo.js'></script>
    
<script language="javascript">
require([
	"dojo/dom",
	"dijit/registry",
    "dijit/MenuBar",
    "dijit/PopupMenuBarItem",
    "dijit/Menu",
    "dijit/MenuItem",
    "dijit/DropDownMenu",
    "dojo/domReady!"
], function(dom, registry, MenuBar, PopupMenuBarItem, Menu, MenuItem, DropDownMenu){
	
	// Here we set up for menu items selected
	
	var onItemSelect = function(event){
		
		switch (this.get("label")) {
			
			case "Logout":
			  location.assign("index.php");
			  break;
			  
			case "New Activity":
			  location.assign("newactivity.php");
			  break;
			  
			case "Search Activity":
			  location.assign("searchactivity.php");
			  break;	
			  
		    case "My Account":
			  location.assign("myaccount.php");
			  break;
			  
		    case "Search Person":
			  location.assign("searchpeople.php");
			  break;
			  
		    case "New Person":
			  location.assign("newpeople.php");
			  break;

		    case "New Advertiser":
			  location.assign("newadvertiser.php");
			  break;

		    case "Search Advertiser":
			  location.assign("searchadvertiser.php");
			  break;
			  
		    case "New Vendor":
			  location.assign("newvendor.php");
			  break;
			  
		    case "Search Vendor":
			  location.assign("searchvendor.php");
			  break;			  			  
			  			  			  
			case "Change Log":
			  window.open("changelog.php", "ChangeLog");
			  break;	
			  
			case "Tasks":		  			  
			  location.assign("tasks.php");
			  break;
			  
			case "By Activity":		  			  
			  location.assign("rptbyactivity.php");
			  break;	
			  
			case "By Membership":		  			  
			  location.assign("rptbymembership.php");
			  break;
			  
			case "Advertiser":		  			  
			  location.assign("rptAdvertiser.php");
			  break;			  
			  
			  
			// Campaigns
			
			case "Send Emails":		  			  
			  location.assign("rptemail.php");
			  break;
			  
			case "Print Letters":		  			  
			  location.assign("rptletter.php");
			  break;
			  
			case "Print Mail Labels":		  			  
			  location.assign("rptletterlabel.php");
			  break;			  			  	  		  
			  		
			case "Edit Letter/Email":		  			  
			  location.assign("listletters.php");
			  break;
			  
			// Parameters
			
			case "Parameters":		  			  
			  location.assign("ParameterMaintenance.php");
			  break;
			  
			case "Suggestion Box":		  			  
			  location.assign("SuggestionBox.php");
			  break;
			  
			case "Review Suggestions":		  			  
			  location.assign("ReviewSuggestions.php");
			  break;			  			  
			  						  			  		  
		} // switch
		
		dom.byId("lastSelected").innerHTML = this.get("label");
	};
	
	
	
    var pMenuBar = new MenuBar({});

    var People = new DropDownMenu({});
    People.addChild(new MenuItem({
        label: "New Person",
		onClick: onItemSelect
    }));
    People.addChild(new MenuItem({
        label: "Search Person",
		onClick: onItemSelect
    }));
    People.addChild(new MenuItem({
        label: "New Advertiser",
		onClick: onItemSelect
    }));
    People.addChild(new MenuItem({
        label: "Search Advertiser",
		onClick: onItemSelect
    }));		
    People.addChild(new MenuItem({
        label: "New Vendor",
		onClick: onItemSelect
    }));	
    People.addChild(new MenuItem({
        label: "Search Vendor",
		onClick: onItemSelect
    }));			
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "People",
        popup: People
    }));



    var Activity = new DropDownMenu({});
    Activity.addChild(new MenuItem({
        label: "New Activity",
        //iconClass: "dijitEditorIcon dijitEditorIconCut",
		onClick: onItemSelect
    }));
    Activity.addChild(new MenuItem({
        label: "Search Activity",
        //iconClass: "dijitEditorIcon dijitEditorIconCopy",
		onClick: onItemSelect
    }));
	/*
    Activity.addChild(new MenuItem({
        label: "Paste",
        iconClass: "dijitEditorIcon dijitEditorIconPaste",
		onClick: onItemSelect
    }));
	*/
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "Activities",
        popup: Activity
    }));
	
	
	
	var Reports = new DropDownMenu({});
	
    Reports.addChild(new MenuItem({
        label: "Advertiser",
		onClick: onItemSelect
    }));
	
    Reports.addChild(new MenuItem({
        label: "By Membership",
		onClick: onItemSelect
    }));	
    Reports.addChild(new MenuItem({
        label: "By Activity",
		onClick: onItemSelect
    }));
	pMenuBar.addChild(new PopupMenuBarItem({
        label: "Reports",
        popup: Reports
    }));



    var Tasks = new DropDownMenu({});
    Tasks.addChild(new MenuItem({
        label: "Tasks",
		onClick: onItemSelect
    }));
	/*
	Tasks.addChild(new MenuItem({
        label: "Search Tasks",
		onClick: onItemSelect
    }));
	*/
	pMenuBar.addChild(new PopupMenuBarItem({
        label: "Tasks",
        popup: Tasks
    }));
	
	
	
	var Campaign = new DropDownMenu({});
    Campaign.addChild(new MenuItem({
        label: "Edit Letter/Email",
		onClick: onItemSelect
    }));
    Campaign.addChild(new MenuItem({
        label: "Print Letters",
		onClick: onItemSelect
    }));	
    //Campaign.addChild(new MenuItem({
    //    label: "Print Mail Labels",
	//	onClick: onItemSelect
    //}));		
    Campaign.addChild(new MenuItem({
        label: "Send Emails",
		onClick: onItemSelect
    }));	
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "Campaign",
        popup: Campaign
    }));
	
	
    var Admin = new DropDownMenu({});
	/*
    Admin.addChild(new MenuItem({
        label: "Review Suggestions",
		onClick: onItemSelect
    }));	
	*/
    Admin.addChild(new MenuItem({
        label: "Suggestion Box",
		onClick: onItemSelect
    }));	
    Admin.addChild(new MenuItem({
        label: "Parameters",
		onClick: onItemSelect
    }));
	Admin.addChild(new MenuItem({
        label: "Change Log",
		onClick: onItemSelect
    }));
	pMenuBar.addChild(new PopupMenuBarItem({
        label: "Admin",
        popup: Admin
    }));
	
	
	
	var Account = new DropDownMenu({});
    Account.addChild(new MenuItem({
        label: "Logout",
		onClick: onItemSelect
    }));
    Account.addChild(new MenuItem({
        label: "My Account",
		onClick: onItemSelect
    }));
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "Account",
        popup: Account
    }));
	
		
	
	
    pMenuBar.placeAt("wrapper");
    pMenuBar.startup();
	
});
</script>