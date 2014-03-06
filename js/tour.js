var TourSteps = function(mobile) {

  mobile = (mobile?"-mobile":"");
  var placement = (mobile?"bottom":"right");
  var placement2 = (mobile?"top":"left");

  return {

    dashboardHome: [
      {
        orphan: true,
        title: "Welcome",
        content: "Welcome to the ScheduleSMS tour. We will start by showing you around the dashboard homepage. When we have finished, click on any of the links on this page to continue the tour"
      },
      {
        element: "#dashboard-menu-home"+mobile,
        title: "Dashboard Home",
        content: "Use this link to come back to your dashboard homepage",
        placement: placement
      },
      {
        element: "#dashboard-menu-account"+mobile,
        title: "Account Settings",
        content: "Manage all of your account settings here",
        placement: placement
      },
      {
        element: "#dashboard-menu-tokens"+mobile,
        title: "Purchase Messages",
        content: "When you're running low on message credits, top up here",
        placement: placement
      },
      {
        element: "#dashboard-menu-contacts"+mobile,
        title: "Contacts",
        content: "This is where all your contact details live. Add or edit contacts in here.",
        placement: placement
      },
      {
        element: "#dashboard-menu-schedule"+mobile,
        title: "Your Schedule",
        content: "See your current scheduled messages for all of your contacts",
        placement: placement
      },
      {
        element: "#dashboard-menu-transactions"+mobile,
        title: "Transactions",
        content: "For your peace of mind, and reference, we show all of your transactions with us here",
        placement: placement
      },
      {
        element: "#dashboard-support",
        title: "Support",
        content: "If you're struggling with anything, or just want to ask a question, this is the place to go.",
        placement: placement
      },
      {
        element: "#dashboard-token-bar",
        title: "Messages remaining",
        content: "Your remaining credits, keep an eye on this to avoid running out.",
        placement: "bottom"
      },
      {
        element: "#contact-search",
        title: "You can search for contacts here.",
        content: "Search using either a name or a number, and we'll show you all matching contacts, try it now! hint: Search for <i>john</i>. Let's try this now",
        placement: "top"
      },
      {
        element: "#contact-search-add-btn",
        title: "Create new contact",
        content: "If you can't find who you are looking for, you can quickly add a new contact here. Let's try this now",
        placement: "top"
      }
    ],


    dashboardAccount: [
      {
        orphan: true,
        title: "Account Settings",
        content: "This page is where you can edit your details, such as your name, contact details or update your password"
      },
      {
        element: "#dashboard-account-id",
        title: "Account ID",
        content: "This is your Account ID and can be used to uniquely identify you to ScheduleSMS.",
        placement: "top"
      },
      {
        element: "#name",
        title: "Your details",
        content: "Your Company name and Email address are required. We need these to be able to contact you. Providing further contact details is up to you.",
        placement: "top"
      },
      {
        element: "#password",
        title: "Your password",
        content: "You can update your password here. If you do not wish to update your password, leave both of these fields blank.",
        placement: "top"
      }
    ],


    dashboardTokens: [
      {
        orphan: true,
        title: "Purchase Messages",
        content: "On this page you can top up your message credits or check out the pricing information for the future"
      },
      {
        element: "#dashboard-paypal",
        title: "PayPal",
        content: "All transactions are handled by PayPal, for your peace of mind. PayPal are the global leaders in online pyaments and offer unparalleled security for you and your business.",
        placement: "top"
      },
      {
        element: "#dashboard-buy",
        title: "Purchase",
        content: "Once you have selected your package, click the buy button to proceed. Most of our customers prefer the premium package as it offers the best balance between cost and messages received.",
        placement: "top"
      }
    ],


    dashboardContacts: [
      {
        orphan: true,
        title: "Contacts",
        content: "This is your main contacts page. Create new, or edit existing - it is up to you!"
      },
      {
        element: "#show-contact-form",
        title: "Create New Contact",
        content: "Click this button to show the new contact form. go ahead, try it!",
        placement: "top"
      },
      {
        element: "#dashboard-buy",
        title: "Purchase",
        content: "Once you have selected your package, click the buy button to proceed. Most of our customers prefer the premium package as it offers the best balance between cost and messages received.",
        placement: "top"
      },
      {
        element: "#name",
        title: "Contact Name",
        content: "Your Company name and Email address are required. We need these to be able to contact you. Providing further contact details is up to you.",
        placement: "top"
      },
      {
        element: "#mobile_phone",
        title: "Mobile phone",
        content: "We insist on a mobile phone number as we are going to be sending SMS messages.",
        placement: "top"
      },
      {
        element: "#email",
        title: "Other Details",
        content: "You can also store other details to help you with the managment of your contacts",
        placement: "top"
      },
      {
        element: "#contact-search",
        title: "You can search for contacts here.",
        content: "Search using either a name or a number, and we'll show you all matching contacts, try it now! hint: Search for <i>john</i>. Let's try this now",
        placement: "top"
      },
      {
        element: "#dashboard-manage"+mobile,
        title: "Manage this contact",
        content: "You can manage this contact...",
        placement: "left"
      },
      {
        element: "#dashboard-schedule"+mobile,
        title: "Schedule a message",
        content: "...or schedule a message for this contact",
        placement: "left"
      },
      {
        element: "#contact-search-add-btn",
        title: "Create new contact",
        content: "If you can't find who you are looking for, you can quickly add a new contact here.",
        placement: "top"
      }
    ],


    dashboardContactsEdit: [
      {
        orphan: true,
        title: "Edit Contact",
        content: "Here you can edit an existing contacts details, and view existing messages for this contact"
      },
      {
        element: "#schedule-table",
        title: "Scheduled messages",
        content: "A list of all messages that are currenly scheduled for this contact",
        placement: "top"
      },
      {
        element: "#unschedule-btn",
        title: "Scheduled messages",
        content: "Click here to unschedule this message",
        placement: "left"
      },
      {
        element: "#schedule-message",
        title: "Schedule a message",
        content: "If you want to schedule a new message for this contact, simply click here.",
        placement: "top"
      },
      {
        element: "#contact-search",
        title: "You can search for contacts here.",
        content: "Search using either a name or a number, and we'll show you all matching contacts.",
        placement: "top"
      }
    ],


    dashboardContactsSchedule: [
      {
        element: "#schedule-tabs",
        title: "Schedule a message",
        content: "Select which type of message you wish to schedule. A fixed message is used for appointment reminds, whereas a custom message can be for anything you wish.",
        placement: "top",
        next: -1,
        prev: -1
      },
      {
        element: "#fixedstep1",
        title: "Type of Fixed message",
        content: "Is this a reminder or a confirmation? Select and click next...",
        placement: "top"
      },
      {
        element: "#fixedstep2",
        title: "Type of Fixed message",
        content: "Is this a meeting or an appointment? Select and click next...",
        placement: "top"
      },
      {
        element: "#fixedstep3",
        title: "When is this appointment for?",
        content: "Select the date of the meeting or appointment, optionally add a time and then click next...",
        placement: "bottom"
      },
      {
        element: "#fixedstep4",
        title: "When should this message be sent",
        content: "Select the date that you would like this message to be sent to the contact and then click next...",
        placement: "bottom"
      },
      {
        element: "#fixed-preview",
        title: "Review your message",
        content: "Review your message and then schedule it for delivery.",
        placement: "top",
        next: -1
      },
      {
        element: "#customcompose",
        title: "Compose your message",
        content: "Here you can write any message you want. An opt-out message will be attached to the end of each message.",
        placement: "top"
      },
      {
        element: "#custom-message-date",
        title: "When should this message be sent",
        content: "Select the date that you would like this message to be sent to the contact and then click next...",
        placement: "bottom"
      },
      {
        element: "#custom-save-yes",
        title: "Save as template?",
        content: "Do you want to save this message as a templte for later us?",
        placement: "top"
      },
      {
        element: "#custom-btn",
        title: "Schedule this message",
        content: "When you're happy with your message, click here to schedule it for delivery!",
        placement: "top",
        next: -1
      },
      {
        element: "#schedule-templates",
        title: "Saved templates",
        content: "Any saved template will apear here, and can be used as custom messages any time in the future",
        placement: "top",
        next: -1
      }
    ],


    dashboardSchedule: [
      {
        orphan: true,
        title: "Your current scheduled messages",
        content: "This is a list of all of your currently scheduled messages. Click the unschedule button to cancel a message.",
        placement: "top",
        next: -1,
        prev: -1
      }
    ],


    dashboardTransactions: [
      {
        orphan: true,
        title: "Your transaction history",
        content: "This is a list of all of your previous transactions, including references for both ScheduleSMS &amp; PayPal.",
        placement: "top",
        next: -1,
        prev: -1
      }
    ],

    dashboardSupport: [
      {
        orphan: true,
        title: "Support",
        content: "Whatever you're struggling with, we are here to help. Simply complete this form and we will get back to you as soon as possible.",
        placement: "top",
        next: -1,
        prev: -1
      }
    ]

  }  

};