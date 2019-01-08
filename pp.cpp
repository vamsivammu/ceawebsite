#include<bits/stdc++.h> 
using namespace std; 
  
//Function to return precedence of operators 
int prec(char c) 
{ 
    if(c == '^') 
    return 3; 
    else if(c == '*' || c == '/') 
    return 2; 
    else if(c == '+' || c == '-') 
    return 1; 
    else
    return -1; 
} 
  
// The main function to convert infix expression 
//to postfix expression 
void infixToPostfix(string s) 
{ 
    std::queue<char> st; 
   
    st.push('N'); 
    int l = s.length(); 
    string ns; 
    for(int i = 0; i < l; i++) 
    { 
        // If the scanned character is an operand, add it to output string. 
        if((s[i] >= 'a' && s[i] <= 'z')||(s[i] >= 'A' && s[i] <= 'Z')) 
        ns+=s[i]; 
  
        // If the scanned character is an ‘(‘, push it to the stack. 
        else if(s[i] == '(') 
          
        st.push('('); 
          
        // If the scanned character is an ‘)’, pop and to output string from the stack 
        // until an ‘(‘ is encountered. 
        else if(s[i] == ')') 
        { 
            while(st.back() != 'N' && st.back() != '(') 
            { 
                char c = st.back();
                 std::queue<char> st1;
                while(st.size()!=1){
                    char p = st.front();
                    st1.push(p);
                    st.pop(); 
                }
                st1.swap(st);
                // st.pop(); 
               ns += c; 
            } 
            if(st.back() == '(') 
            { 
                char c = st.back(); 
                   std::queue<char> st2;
                while(st.size()!=1){
                    char p = st.front();
                    st2.push(p);
                    st.pop(); 
                }
                st2.swap(st);
                 
            } 
        } 
          
        //If an operator is scanned 
        else{ 
            while(st.back() != 'N' && prec(s[i]) <= prec(st.back())) 
            { 
                char c = st.back(); 
                   std::queue<char> st3;
                while(st.size()!=1){
                    char p = st.front();
                    st3.push(p);
                    st.pop(); 
                }
                st3.swap(st);
                 
                ns += c; 
            } 
            st.push(s[i]); 
        } 
  
    } 
    //Pop all the remaining elements from the stack 
    while(st.back() != 'N') 
    { 
        char c = st.back(); 
           std::queue<char> st4;
                while(st.size()!=1){
                    char p = st.front();
                    st4.push(p);
                    st.pop(); 
                }
                st4.swap(st);
        
        ns += c; 
    } 
      
    cout << ns << endl; 
  
} 
  
//Driver program to test above functions 
int main() 
{ 
    string exp = "a+b*(c^d-e)^(f+g*h)-i"; 
    infixToPostfix(exp); 
    return 0; 
} 