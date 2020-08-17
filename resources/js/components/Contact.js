import React from 'react';

function Contact(props) {
    let unread = '';
    if(props.contact.unread){
        unread = <span className="unread">{props.contact.unread} </span>;

    }
    return(
        <li onClick={() => props.selectContact(props.contact)}>
            <div className="contact">
                <p className="name">{props.contact.name}</p>
            </div>
            {unread}
        </li>
    )
}

export default Contact;
