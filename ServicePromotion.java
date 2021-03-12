/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.esprit.services;

import com.esprit.models.Promotion;
import com.esprit.utils.DataSource;
import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;

/**
 *
 * @author infoMix
 */
public class ServicePromotion {
     Connection cnx = DataSource.getInstance().getCnx();
    private Statement stm;
    //private PreparedStatement pst;
    private ResultSet rs;
         private PreparedStatement pst;
 int id_promo  ;
    int pourcentage ;
    Date date_debut ;
    Date date_fin ;


    public void Ajouter(Promotion t) 
    {
        try {
            String req="INSERT INTO promotion (pourcentage,date_debut,date_fin) VALUES (?,?,?)";
            PreparedStatement pst=cnx.prepareStatement(req);
            pst.setInt(1,t.getPourcentage());
            pst.setDate(2,t.getDate_debut());
            pst.setDate(3,t.getDate_fin());
           
            
            pst.executeUpdate();
                    System.out.println("cbn");

        } catch (SQLException ex) {
//            Logger.getLogger(ServiceEvent.class.getName()).log(Level.SEVERE, null, ex);
System.out.println("mcbnch");
        }
    }
    public ObservableList<Promotion> lister(){
           ObservableList<Promotion> list1 =FXCollections.observableArrayList();
           String requete="SELECT id_promo,pourcentage,date_debut,date_fin) FROM promotion";
            try {
                PreparedStatement pst = cnx.prepareStatement(requete)  ; 
                 ResultSet rs = pst.executeQuery();
                    while (rs.next()){
                     list1.add
        (new Promotion(rs.getInt(1),rs.getInt(2),rs.getDate(3),
                rs.getDate(4)));
                 
                     }
                System.out.println("lister promotion");
                }  
            catch (SQLException ex) {
            
            } 
//        for( Joueurs j : list1)
//        System.out.println(j.getId()+"/"+j.getNom()+"/"+j.getPrenom()+"/"+ j.getAge()+"/"+ j.getclub_name());
        
     return list1;
    }
 
    public void Modifier(Promotion t) 
    {
       
          try {
              
              String sql = "UPDATE promotion SET pourcentage=?,date_debut=?,date_fin=? WHERE id_promo=?";
              PreparedStatement statement = cnx.prepareStatement(sql,PreparedStatement.RETURN_GENERATED_KEYS);
              try {
                  statement.setInt(1, t.getPourcentage());
                  statement.setDate(2,(Date)t.getDate_debut());
                  statement.setDate(3, (Date)t.getDate_fin());
                                   statement.setInt(4, Integer.valueOf(t.getId_promo()));

                  System.out.println(statement);
                  statement.executeUpdate();
                  System.out.println("update done");
              } catch (SQLException ex) {
                  Logger.getLogger(ServicePromotion.class.getName()).log(Level.SEVERE, null, ex);
              }
              
          } catch (SQLException ex) {
            Logger.getLogger(ServicePromotion.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    
    /**
     *
     * @param e
     * @throws SQLException
     */
    
    public void Supprimer(Promotion e) throws SQLException 
    { 
    
 try { 
            String delete = "DELETE FROM promotion WHERE id_promo = ? ";
        PreparedStatement st2 = cnx.prepareStatement(delete);
        int id = e.getId_promo();
        
        st2.setInt(1,id);
 


        st2.executeUpdate();
       

        } catch (SQLException ex) {
            Logger.getLogger(ServicePromotion.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
    
    
 

    public List<Promotion> Afficher() {
        List<Promotion> l = new ArrayList<>();
         
         
      
        try {
            String req="SELECT * FROM promotion";
            stm=cnx.createStatement();
            rs=stm.executeQuery(req);
            while(rs.next())
            {

                Promotion e = new Promotion();
                                e.setId_promo(rs.getInt("id_promo"));

                e.setPourcentage(rs.getInt("pourcentage"));
                e.setDate_debut(rs.getDate("date_debut"));
                 e.setDate_fin(rs.getDate("date_fin"));
                System.out.println(e);

                l.add(e);

            }
        } catch (SQLException ex) {
            Logger.getLogger(ServicePromotion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return l;
    }

   


   
   

  

    

}
