import React from 'react';

function MessageComposer(props) {

    let handleKeyPress = event => {

        if (event.key === 'Enter') {
            if (event.target.value == "") {
                return;
            }
            props.sendMessage(event.target.value);
            event.preventDefault();
            event.target.value = '';
        }

    };
    return (<div className="composer">
        <textarea onKeyPress={handleKeyPress} cols="30" rows="10" placeholder="message"></textarea>
    </div>)
}

export default MessageComposer;
