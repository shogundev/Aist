import React from 'react';
import MessagesFeed from "./MessagesFeed";
import MessageComposer from "./MessageComposer";

function Conversation(props) {
    return(<div className="conversation">
        <h1>{ props.contact ? props.contact.name : 'Select a Contact' }</h1>
        <MessagesFeed contact={props.contact} messages={props.messages}/>
        <MessageComposer sendMessage={props.sendMessage}/>
    </div>)
}

export default Conversation;
