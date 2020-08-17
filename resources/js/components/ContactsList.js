import React from 'react';
import Contact from "./Contact";

function ContactsList(props) {

    let contacts = props.contacts.map((item) => {
        return   <Contact contact={item} selectContact={props.selectContact} key={item.id}/>
    });

    return(<div className="contacts-list">
        <ul>
            {contacts}
        </ul>
    </div>)
}

export default ContactsList;
