/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.esprit.services;

import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author maram
 * @param <T>
 */
public interface IService<T> { 
    
    public void Ajouter(T t);
    public void Supprimer(T t) throws SQLException ;
    public void Modifier(T t );
   public List<T> afficher();
   
}
