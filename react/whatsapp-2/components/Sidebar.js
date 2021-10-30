import styled from 'styled-components'
import PersonOutlineIcon from '@mui/icons-material/PersonOutline';
import ChatBubbleOutlineIcon from '@mui/icons-material/ChatBubbleOutline';
import MoreVertIcon from '@mui/icons-material/MoreVert';
import { IconButton,Button } from '@mui/material';
import SearchIcon from '@mui/icons-material/Search';
import * as EmailValidator from 'email-validator';
function Sidebar() {
    const CreateChat = () => {
        const input = prompt(
            "Please enter an email you want to chat: "
            );

        if (!input) return null;
        if(EmailValidator.validate(input)){
            // add to chat collection
        }

        

    }
    return (
        <Container>
            <Header>
                <UserAvatar/>

                <IconContainer>
                    <IconButton>
                        <ChatBubbleOutlineIcon/>
                    </IconButton>
                    
                    <IconButton>
                        <MoreVertIcon/>
                    </IconButton>
                </IconContainer>
            </Header>
            <Search>
                <SearchIcon/>
                <SearchInput placeholder="Search here..." />
            </Search>   
            <SideBarButton variant="outlined" onClick={CreateChat}>Start a new Chat</SideBarButton>
            {/* list of chats will be here */}
        </Container>
    )   
}

export default Sidebar;
const Container = styled.div``;
const Search = styled.div`
    display:flex;
    align-items: center;
    padding:20px;
    border-radius:2px;
    

`;
const SideBarButton = styled(Button)`
    width:90%;

    &&&{
        
        margin:15px;
    }
`;
const SearchInput = styled.input`   
    outline-width: 0;
    border:none;
    flex:1;
`;
const Header = styled.div`
    position:sticky;
    display:flex;
    padding:15px;
    background:white;
    top:0;
    z-index:1;
    align-items:center;
    justify-content: space-between;
    height:80px;
    border-bottom:1px solid whitesmoke;
    
`;
const UserAvatar = styled(PersonOutlineIcon)`
    font-size:20px;
    cursor:pointer;
    transition:0.2s ease-in-out;
    :hover{
        opacity:0.5;
    }
`;

const IconContainer = styled.div ``;