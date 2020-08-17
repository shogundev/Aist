import React from 'react';
import ReactDOM from 'react-dom';
import axios from "axios";
import Conversation from "./Conversation";
import ContactsList from "./ContactsList";


class  ChatApp extends React.Component {
    constructor() {
        super();
        this.state = {
            selectedContact: null,
            messages: [],
            contacts: [],
        }
    }

    startConversationWith(contact) {
        axios.get(`/conversation/${contact.id}`)
            .then((response) => {
                this.setState({messages:response.data});
                this.setState({selectedContact:contact});
            })
    }


    sendMessage(message) {
        if (!this.state.selectedContact) {
            return;
        }

        axios.post('/conversation/send', {
            contact_id: this.state.selectedContact.id,
            text: message
        }).then((response) => {
            this.state.messages.push(response.data)
        })
    }


   componentDidMount() {
       Echo.private(`messages.${window.user.id}`)
           .listen('NewMessage', (e) => {

           });
       axios.get('/contacts')
           .then((response) => {
               this.setState({contacts:response.data});
           });
   }

    componentWillUnmount() {
        this.setState = (state,callback)=>{
            return;
        };
    }

    render() {
       return (
           <div className="chat-app">
               <Conversation contact={this.state.selectedContact} messages={this.state.messages} sendMessage={this.sendMessage}/>
               <ContactsList contacts={this.state.contacts} selectContact={this.startConversationWith.bind(this)}/>
           </div>
       );
   }


}

export default ChatApp;

