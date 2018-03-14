/*
 * Copyright 2012 Faisal Aslam.
 * All Rights Reserved.
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS FILE HEADER
 * 
 * This code is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 3
 * only, as published by the Free Software Foundation.
 * 
 * This code is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License version 3 for more details (a copy is
 * included in the LICENSE file that accompanied this code).
 * 
 * You should have received a copy of the GNU General Public License
 * version 3 along with this work; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
 * 02110-1301 USA
 * 
 * Please contact Faisal Aslam (faisal.aslam AT gmail.com)
 * if you need additional information or have any questions.
 */
package lexicalanalyser;

import java.util.*;
import lexicalanalyser.transTables.*;

/**
 *
 * It simulates DFA on all the transition table.
 * It return true if the given stream is accepted on a single transition table
 * it return false if it is not accepted on any of the given transition table.
 * 
 * @author Faisal Aslam
 */
public class DFASimulator {


    private static final String DUMMY_STATE = "&DUMMY$";
   
    
    /**
     * In case the given input string is accepted then it returns the start
     * state of the transition table that has accepted the input stream.
     * Otherwise, it returns null
     * 
     * @param tt you can get it from the TransitionTableController
     * @param sourceFileStream
     * @return 
     * @throws Exception 
     */
    public State isAccepted(Collection<TransitionTable> tt, char[] sourceFileStream) throws Exception {
        /**
         * Write your code here.
         */
    	
    	TransitionTable transitionTable= new TransitionTable();
    	Iterator<TransitionTable> table=tt.iterator();
    	char ch;
    	int lengthofFile= sourceFileStream.length;
    	int coutner=0;
    	boolean IfFoundAlphabet=false;
    	while(table.hasNext()){
    		System.out.println("ok this is my meaakjnkjandnad");	
    		State startState=transitionTable.getStartState();
    		TransitionTable t;
    		t=table.next();
    		State curStat=startState;
    	    ArrayList<Alphabet> allalphabets=t.getAllAphabets();	
    	    Iterator<Alphabet> alpha=allalphabets.iterator();
           for(int i=0;i<lengthofFile;i++){
            	IfFoundAlphabet=false;
            	System.out.println("ok");
            	Alphabet alphabets;
                while(alpha.hasNext()){
                	 alphabets=alpha.next();
                	 ch=sourceFileStream[i];//checking character by character
                	if(alphabets.contains(ch)){
                		IfFoundAlphabet=true;
                		System.out.println("ok");
           	                break;
                	}
                }
                	if(IfFoundAlphabet==false){
              		break;
                	}
                  	
            } // end of for loop which is checking lenght of source file stream
        if(!IfFoundAlphabet)
        	continue;
        for(int i=0;i<sourceFileStream.length;i++){
        	ch=sourceFileStream[i];
        	curStat=t.move(curStat, ch);
        }
    	if(t.isFinal(curStat)){
    		return startState;
    	  }
    	}// end of getting transition table from the list of transition tables
    	
        return null;
    }
    
    public boolean isDummyState(State s) {
        if (s.getCurrentStateName().equals(DUMMY_STATE)) {
            return true;
        }
        return false;
    }
}
