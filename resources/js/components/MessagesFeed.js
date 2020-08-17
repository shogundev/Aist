import React from 'react';

function MessagesFeed(props) {
    if(props.contact){
        let messageItems = props.messages.map((item)=>{
            return <li className={`message ${item.to == props.contact.id ? ' sent' : ' received'}`} key={item.id}>
                <div className="text">{item.text}</div>
            </li>
        })
        return(<div className="feed">
            <ul>
                {messageItems}
            </ul>
        </div>)
    }
        return(<div className="feed">
        </div>)

}

export default MessagesFeed;
