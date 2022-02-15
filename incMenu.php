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
			
			// Account
			
			case "Logout":
			  location.assign("index.php");
			  break;
			    
		    case "My Account":
			  location.assign("myaccount.php");
			  break;		  			  
			  			  		
			// Time
			
			case "Set Start":
			  location.assign("setstart.php");
			  break;
			  
		    case "Set End":
			  location.assign("setend.php");
			  break;
			  
			// Definitions
			
			case "Tasks":		  			  
			  location.assign("edittasks.php");
			  break;
			  
			case "Projects":		  			  
			  location.assign("editproj.php");
			  break;		  
			  
			case "Clients":		  			  
			  location.assign("editclient.php");
			  break;			  
			
			// Admin
			
			case "Change Log":
			  window.open("changelog.php", "ChangeLog");
			  break;
			
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
/*
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
*/

/*
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
	/*
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "Activities",
        popup: Activity
    }));
	*/
	
	/*
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
    */

    
    var Time = new DropDownMenu({});
	
    Time.addChild(new MenuItem({
        label: "Set Start",
		onClick: onItemSelect
    }));
	
    Time.addChild(new MenuItem({
        label: "Set End",
		onClick: onItemSelect
    }));	
	
	pMenuBar.addChild(new PopupMenuBarItem({
        label: "Time",
        popup: Time
    }));
		
	
	var Definitions = new DropDownMenu({});
    Definitions.addChild(new MenuItem({
        label: "Tasks",
		onClick: onItemSelect
    }));
    Definitions.addChild(new MenuItem({
        label: "Projects",
		onClick: onItemSelect
    }));	
    //Campaign.addChild(new MenuItem({
    //    label: "Print Mail Labels",
	//	onClick: onItemSelect
    //}));		
    Definitions.addChild(new MenuItem({
        label: "Clients",
		onClick: onItemSelect
    }));	
    pMenuBar.addChild(new PopupMenuBarItem({
        label: "Definitions",
        popup: Definitions
    }));
	
	
    var Admin = new DropDownMenu({});

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